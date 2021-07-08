@extends('mentalheal.transaction.template')

@section('content')
<div class="container">
    <p class="display-3 text-center">Event History</p>
    <div class='my-5'>
        <div class="row justify-content-center">
            @foreach($transactions as $transaction)
            <div class="card my-2" style="width: 900px;">
                <div class="card-body my-2">
                    <h5 class="card-title">{{ $transaction->event->title }}</h5>
                    <div class="row justify-content-between">
                        <div class="col-4">
                            <h6 class="card-subtitle mb-2 text-muted">Held by {{ $transaction->event->user->name }}</h6>
                            <p class="card-text">Date: {{ $transaction->event->date }} until
                                {{ $transaction->event->end_date }}
                            </p>
                            <p>Ticket amount: {{$transaction->amount}}</p>
                        </div>
                        <div class="col-2">
                            <p class="fs-5">Rp. {{ $transaction->total }}</p>
                            @if ($transaction->status == 1)
                            <p class='text-center'>Paid</p>
                            @else
                            <p class='text-center'>Unpaid</p>
                            @endif
                        </div>
                    </div>

                </div>
            </div>
            @endforeach
        </div>

    </div>

</div>



@endsection