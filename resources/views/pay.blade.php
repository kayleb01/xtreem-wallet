@extends('layouts.app')

@section('content')
<h3>Buy Movie Tickets N500.00</h3>
<form method="POST" action="{{ route('pay') }}" id="paymentForm">
    {{ csrf_field() }}
    <select name="payment_option" id="payment_option">
        <option value="card">Card</option>
    </select>
    <input name="name" type="text" placeholder="Name" />
    <input name="email" type="email" placeholder="Your Email" />
    <input name="phone" type="tel" placeholder="Phone number" />
    <input name="amount" type="number" placeholder="Please enter the amount here">

    <input type="submit" value="Buy" />
</form>
@endsection
