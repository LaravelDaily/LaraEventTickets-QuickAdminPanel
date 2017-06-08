<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Http\Requests\Guest\StorePaymentsRequest;
use App\Payment;
use App\Payments_tickets;
use App\Ticket;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Stripe\Charge;
use Stripe\Error\Card;
use Stripe\Stripe;


class PaymentsController extends Controller
{

    public function store(StorePaymentsRequest $request)
    {
		$token = $request->input('stripeToken');
		$requestTotal = round(floatval($request->input('total')), 2);
		$requestTickets = json_decode($request->input('tickets'));
		$email = $request->input('email');

        $ids = array();
		foreach ($requestTickets->tickets as $entry ) {
		    $ids[] = $entry->id;
        }

        $now = Carbon::now()->toDateString();
		// prevent obtaining tickets via crafted request
        $match = [
            ['available_from', '<=', $now],
            ['available_to', '>=', $now]
        ];
        $tickets = Ticket::where($match)->findMany($ids);

        // can we satisfy order at all?
        $total = $this->validateTotal($tickets, $requestTickets, $requestTotal);
        if($total) {
            return $this->createStripeCharge($token, $total, $requestTickets, $email);
        }

        return redirect()->back()->with('error', 'Please review your order and try again.');
    }

    public function makeTransaction($requestTickets, $total, $email)
    {
        try {
            DB::transaction(function() use ($requestTickets, $total, $email) {
                $newPayment = Payment::create([
                    'email' => $email,
                    'merchant' => 'Stripe',
                    'amount' => $total
                ]);
                foreach ($requestTickets->tickets as $entry ) {
                    $newPaymentsTickets = Payments_tickets::create([
                        'payment_id' => $newPayment->id,
                        'ticket_id' => $entry->id,
                        'tickets_amount' => $entry->amount
                    ]);
                    $ticket = Ticket::findOrFail($entry->id);
                    $ticket->update([
                        'amount' => $ticket->amount - $entry->amount
                    ]);
                }
            });
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Your order did not complete. Please try again.');
        }

        return redirect()->back()->with('message', 'Payment completed successfully.');
    }

    // calculate tickets' price
    // this is necessary due to price changes during payment
    // and make sure we have available tickets
    public function validateTotal($tickets, $requestTickets, $requestTotal)
    {
        $total = 0;
        foreach ($tickets as $ticket) {
            foreach ($requestTickets->tickets as $entry ) {
                if ($ticket->id === $entry->id && $ticket->amount > 0 && $ticket->amount >= (int)$entry->amount && (int)$entry->amount > 0) {
                    $total += $ticket->price * $entry->amount;
                }
            }
        }
        $total = round($total, 2);

        // compare requested order price against calculated
        // this cannot pass if ticket price changes or some tickets are not available anymore
        if ($total === $requestTotal) {
            return $total;
        }

        return False;
    }

    public function createStripeCharge($token, $total, $requestTickets, $email)
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));

        try {
            $charge = Charge::create(array(
                "amount" => $total * 100,
                "currency" => "eur",
                "description" => "Ticket charge", // needs better description
                "source" => $token
            ));
        } catch (Card $e) {
            // get error message from $charge response
            return redirect()->back()->with('error', 'Your credit card has been declined.');
        }

        // call transaction post charge
        return $this->makeTransaction($requestTickets, $total, $email);
    }
}
