@extends('site.master')

@php
    $name = 'name_'.app()->currentLocale();
@endphp

@section('title', 'Checkout | ' . env('APP_NAME'))

@section('content')
<section class="page-header">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="content">
					<h1 class="page-name">Checkout</h1>
					<ol class="breadcrumb">
						<li><a href="{{ route('site.home') }}">Home</a></li>
						<li class="active">checkout</li>
					</ol>
				</div>
			</div>
		</div>
	</div>
</section>

<div class="page-wrapper">
    <div class="cart shopping">
      <div class="container">
        <div class="row">
          <div class="col-md-8 col-md-offset-2">
            <div class="block">
                <script src="https://eu-test.oppwa.com/v1/paymentWidgets.js?checkoutId={{ $id }}"></script>
                <form action="{{ route('site.payment') }}" class="paymentWidgets" data-brands="VISA MASTER AMEX MADA APPLEPAY"></form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


@stop
