@extends('mentalheal.transaction.template')

@section('content')
<div class="container>
    <div class="row justify-content-center">
        <div class="col-8 mb-5">
            <h1 class="display-1 text-center">Buying Ticket..</h1>
        </div>
        <div class="col-12">
            <div class="container mt-3">
                <div class="row justify-content-center">
                    <div class="col-4 mb-5">
                        <div class="card text-center">
                            <img src="{{ $event->poster }}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <a href="" class="fs-2 text-decoration-none">{{ $event->title }}</a>
                                <p class="text-secondary mt-2 fst-italic">published by {{ $event->user->name }}</p>
                                <hr>
                                <p class="fs-1">Rp. {{ $event->price }}</p>
                                <hr>
                                <p class="">Start: {{ $event->date }}</p>
                                <p class="">End: {{ $event->end_date }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 mb-5">
                        <div class="card">
                            <div class="card-body">
                                <p class="display-6">Hei, {{ $user->name }}</p>
                                <p>You're about to buy ticket for this event:</p>

                                <!-- FORM GAK PAKE METHOD -->
                                <form name="form" class="mt-5" action="{{ route('events.thankyou') }}"> 
                                    <legend>Order Details</legend>
                                    <fieldset disabled="disabled">
                                        <div class="mb-3">
                                            <label for="event_id" class="form-label">Event ID</label>
                                            <input type="text" id="event_id" name="event_id" class="form-control"
                                                value='{{$event->id}}' placeholder="{{ $event->title }}">
                                        </div>
                                    </fieldset>
                                    <div class="mb-3">
                                        <input type="hidden" id="event_id" name="event_id" class="form-control"
                                            value='{{$event->id}}' placeholder="{{ $event->title }}">
                                        <input type="hidden" id="user_id" name="user_id" class="form-control"
                                            value='{{$user->id}}'>
                                        <label for="amount" class="form-label">Amount</label>
                                        <input type="number" id="amount" name="amount" min="1" class="form-control"
                                            placeholder="How many tickets will you buy" onchange="myFunction()" value='1'>

                                    </div>
                                    <fieldset disabled="disabled">
                                        <div class="mb-3">
                                            <label for="total" class="form-label">Total</label>
                                            <input type="text" id="tot" name="tot" class="form-control"
                                                placeholder="Amount that you have to pay" value="{{ $event->price }}">
                                        </div>
                                    </fieldset>
                                    <input type="hidden" id="total" name="total" class="form-control"
                                                placeholder="Amount that you have to pay" value="{{ $event->price }}">

                                    <div>
                                        <button type="submit" class="btn btn-primary mt-5">Order</button>
                                    </div>


                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
function myFunction() {
    var x = document.getElementById("amount").value * {{ $event-> price }};
    document.getElementById("total").value = x;
    document.getElementById("tot").value = x;
    console.log(x);
}
</script>

@endsection