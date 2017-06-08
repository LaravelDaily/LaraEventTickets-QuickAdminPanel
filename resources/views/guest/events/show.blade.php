@extends('layouts.guest')

@section('content')
    @include('partials.guest.header')

    @if(!$tickets->isEmpty())
    <script type="text/javascript">
        $(document).ready(function(){
            @foreach($tickets as $ticket)
                $('.ticket-{{ $ticket->id }} .quantity').on('click keyup change blur', function() {
                    var quantity = parseInt($('.ticket-{{ $ticket->id }} .quantity').val());
                    if(isNaN(quantity)) {
                        quantity = 0;
                        $('.ticket-{{ $ticket->id }} .quantity').val(0);
                    } else if (quantity < 0) {
                        quantity = 0;
                        $('.ticket-{{ $ticket->id }} .quantity').val(0);
                    } else if (quantity > {{ $ticket->amount }}) {
                        quantity = parseInt({{ $ticket->amount }});
                        $('.ticket-{{ $ticket->id }} .quantity').val({{ $ticket->amount }});
                    }
                    var subtotal = parseFloat({{ $ticket->price }}) * quantity;
                    $('.ticket-{{ $ticket->id }} .subtotal').text(subtotal.toFixed(2));
                    $('.ticket-{{ $ticket->id }} .rsubtotal').val(subtotal.toFixed(2));
                });
            @endforeach
            $('.quantity').on('click keyup change blur', function () {
                var sum = 0;
                var collection = { tickets: [] };
                $('.quantity').each(function () {
                    var ticket = {};
                    ticket['id'] = $(this).data('ticket');
                    ticket['amount'] = $(this).val();
                    collection.tickets.push(ticket);
                });
                $('.rsubtotal').each(function () {
                    sum += Number($(this).val());
                    $('.rtotal').val(sum.toFixed(2));
                    $('.total').text(sum.toFixed(2));
                });
                $('input[name=tickets]').val(JSON.stringify(collection));
            });
        });
    </script>
    @endif

    @if (env('STRIPE_KEY'))
    <script type="text/javascript">
        $(document).ready(function () {
            var stripe = Stripe('{{ env('STRIPE_KEY') }}');
            var elements = stripe.elements();

            var style = {
                base: {
                    // Add your base input styles here. For example:
                    fontSize: '16px',
                    lineHeight: '24px'
                }
            };

            var card = elements.create('card', {style: style, hidePostalCode: true});
            card.mount('#card-element');

            card.addEventListener('change', function (event) {
                var displayError = document.getElementById('card-errors');
                if (event.error) {
                    displayError.textContent = event.error.message;
                    $('#card-errors').show(400, 'swing');
                } else {
                    displayError.textContent = '';
                    $('#card-errors').hide();
                }
            });

            var form = document.getElementById('payment-form');
            form.addEventListener('submit', function (event) {
                event.preventDefault();

                stripe.createToken(card).then(function (result) {
                    if (result.error) {
                        var errorElement = document.getElementById('card-errors');
                        errorElement.textContent = result.error.message;
                    } else {
                        stripeTokenHandler(result.token);
                    }
                })
            });

            function stripeTokenHandler(token) {
                var form = document.getElementById('payment-form');
                var hiddenInput = document.createElement('input');
                hiddenInput.setAttribute('type', 'hidden');
                hiddenInput.setAttribute('name', 'stripeToken');
                hiddenInput.setAttribute('value', token.id);
                form.appendChild(hiddenInput);

                form.submit();
            }
        });
    </script>
    @endif

    <section class="content events">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <h2>{{ $event->title }}</h2>
                            <div>{!! $event->description !!}</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="event-meta">
                                <div class="datetime">Start time: <span class="label label-default">{{ $event->start_time }}</span></div>
                                <div class="venue">Venue: <span class="label label-info">{{ $event->venue }}</span></div>
                            </div>

                            @if(!$tickets->isEmpty())
                            <div class="tickets">
                                <h3>Buy Tickets</h3>
                                <form action="{{ route('guest.payment') }}" method="POST" id="payment-form">
                                    {{ csrf_field() }}
                                    <table class="table table-tickets">
                                        <thead>
                                            <th>Type</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                            <th>Total</th>
                                        </thead>
                                        <tbody>
                                            @foreach($tickets as $ticket)
                                                <tr class="ticket-{{ $ticket->id }}">
                                                    <td>{{ $ticket->title }}</td>
                                                    <td><input
                                                                type="number"
                                                                class="quantity form-control"
                                                                min="0"
                                                                max="{{ $ticket->amount }}"
                                                                step="1"
                                                                value="0"
                                                                data-ticket="{{ $ticket->id }}">
                                                    </td>
                                                    <td><strong>{{ $ticket->price }}&nbsp;€</strong></td>
                                                    <td>
                                                        <strong class="subtotal">0.00</strong><strong>&nbsp;€</strong>
                                                        <input
                                                                class="rsubtotal"
                                                                type="hidden" value="0.00"
                                                                disabled>
                                                    </td>
                                                </tr>
                                            @endforeach
                                                <tr class="last">
                                                    <td colspan="3"></td>
                                                    <td><strong class="total">0.00</strong><strong>&nbsp;€</strong><input type="hidden" name="total" class="rtotal" value="0.00"></td>
                                                </tr>
                                        </tbody>
                                    </table>
                                    <input type="hidden" name="tickets">
                                    @if (!env('STRIPE_KEY'))
                                        <div id="card-errors" class="alert alert-danger">Error: Stripe (.env) not configured for payment.</div>
                                    @else
                                        <div class="input-group">
                                            <span class="input-group-addon">@</span>
                                            <input type="email" name="email" class="form-control" placeholder="email@example.com">
                                        </div>
                                        <div id="card-element"></div>
                                        <div id="card-errors" class="card-errors alert alert-danger"></div>
                                        @if (session('message'))
                                            <div class="alert alert-success">{{ session('message') }}</div>
                                        @endif
                                        @if (session('error'))
                                            <div class="alert alert-danger">{{ session('error') }}</div>
                                        @endif
                                        <button class="btn btn-success" style="float: right">Pay Now</button>
                                    @endif
                                </form>
                            </div>
                            @else
                                <div class="alert alert-warning">We're sorry, but there are no tickets available</div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection