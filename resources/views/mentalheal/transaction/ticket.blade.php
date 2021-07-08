@extends('mentalheal.transaction.template')

@section('content')
<div class="container text-center">
    <p class="display-1 mb-5">Thankyou for your transaction!</p>
    <p>Your transaction detail:</p>
    <p>Product: {{ $request->event_id }}</p>
    <p class="fs-2">{{ $event->title }}</p>
    <p>Amount that you have to pay: </p>
    <p class="fs-3"> Rp. {{ $request->total }}</p>
    <p class='display-6'>You can pay your ticket through this account:</p>
    <p class='fs-3'>Dana - ############## (Hamilton)</p>
    <br>
    <p>Let us know if you have any questions!</p>
    <p>Help center:</p>
    <p>081911633012 (Halim)</p>
    <a href="{{route('articles')}}" class="btn btn-primary">Done</a>
</div>



@endsection