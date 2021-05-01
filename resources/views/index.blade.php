
@extends('layouts.app')

@section('content')
    <Dashboard :isProduction="false" :callback="callback" :close="close"></Dashboard>
@endsection



