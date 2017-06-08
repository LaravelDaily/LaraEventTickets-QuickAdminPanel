<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class TicketSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (\App\Event::all() as $event) {
            $early_price = rand(10,29);
            \App\Ticket::create([
                'event_id' => $event->id,
                'title' => 'Early Bird Ticket',
                'amount' => 100,
                'available_from' => Carbon::createFromFormat('Y-m-d H:i:s', $event->start_time)->subDays(120)->toDateString(),
                'available_to' => Carbon::createFromFormat('Y-m-d H:i:s', $event->start_time)->subDays(60)->toDateString(),
                'price' => $early_price
            ]);
            \App\Ticket::create([
                'event_id' => $event->id,
                'title' => 'Regular Ticket',
                'amount' => 1000,
                'available_from' => Carbon::createFromFormat('Y-m-d H:i:s', $event->start_time)->subDays(59)->toDateString(),
                'available_to' => Carbon::createFromFormat('Y-m-d H:i:s', $event->start_time)->toDateString(),
                'price' => $early_price * 1.2
            ]);
        }
    }
}
