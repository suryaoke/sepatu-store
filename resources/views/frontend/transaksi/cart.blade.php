@extends('frontend.frontend_master')

@section('header')
    @include('frontend.body.header2')
@endsection
<style>
    /* Styling for table */
    table {
        width: 100%;
        border-collapse: collapse;
        margin: 20px 0;
        font-size: 16px;
        text-align: left;
    }

    /* Table header styling */
    table thead th {
        background-color: #9FDDFF;
        /* Green background */
        color: white;
        padding: 12px 15px;
        text-transform: uppercase;
    }

    /* Table body styling */
    table tbody td {
        padding: 12px 15px;
        border-bottom: 1px solid #ddd;
    }

    /* Row hover effect */
    table tbody tr:hover {
        background-color: #f1f1f1;
    }

    /* Zebra striping */
    table tbody tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    /* Responsive table */
    @media (max-width: 600px) {
        table thead {
            display: none;
        }

        table tbody tr {
            display: block;
            margin-bottom: 10px;
        }

        table tbody td {
            display: block;
            text-align: right;
            padding-left: 50%;
            position: relative;
        }

        table tbody td::before {
            content: attr(data-label);
            position: absolute;
            left: 0;
            width: 50%;
            padding-left: 15px;
            font-weight: bold;
            text-align: left;
        }
    }
</style>
@section('frontend')
    @livewire('chart')
@endsection
