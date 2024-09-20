@extends('frontend.frontend_master')

@section('header')
    @include('frontend.body.header2')
@endsection

@section('frontend')
    @livewire('sepatu-kategori', ['slug' => $slug])
@endsection
