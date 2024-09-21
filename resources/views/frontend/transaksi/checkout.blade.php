@extends('frontend.frontend_master')

@section('header')
    @include('frontend.body.header2')
@endsection

@section('frontend')
    @livewire('voucher', ['slug' => $slug])
@endsection


