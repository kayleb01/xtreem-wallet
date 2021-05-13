@extends('layouts.app')

@section('content')

<complete-transaction :transaction="{{$transaction}}"/>

@endsection
