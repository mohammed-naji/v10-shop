@extends('site.master')

@php
    $name = 'name_'.app()->currentLocale();
@endphp

@section('title', 'Checkout | ' . env('APP_NAME'))

@section('content')

<div class="page-wrapper">
    <div class="cart shopping">
      <div class="container">
        <div class="row">
          <div class="col-md-8 col-md-offset-2">
            <div class="block">
                <div class="alert alert-success">
                    <h2>Payment Done Successfully</h2>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


@stop
