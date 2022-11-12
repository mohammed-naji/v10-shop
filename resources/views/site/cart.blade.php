@extends('site.master')

@php
    $name = 'name_'.app()->currentLocale();
@endphp

@section('title', 'Cart | ' . env('APP_NAME'))

@section('content')
<section class="page-header">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="content">
					<h1 class="page-name">Cart</h1>
					<ol class="breadcrumb">
						<li><a href="{{ route('site.home') }}">Home</a></li>
						<li class="active">cart</li>
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
              <div class="product-list">
                <form method="post">
                  <table class="table">
                    <thead>
                      <tr>
                        <th class="">Name</th>
                        <th class="">Price</th>
                        <th class="">Quantity</th>
                        <th class="">Total</th>
                        <th class="">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                        @php
                            $total = 0;
                        @endphp
                        @auth
                            @foreach (Auth::user()->carts as $cart)
                                <tr class="">
                                    <td class="">
                                    <div class="product-info">
                                        <img width="80" src="{{ asset('uploads/'.$cart->product->image) }}" alt="">
                                        <a href="#!">{{ $cart->product->$name }}</a>
                                    </div>
                                    </td>
                                    <td class="">${{ $cart->price }}</td>
                                    <td class="">{{ $cart->quantity }}</td>
                                    <td class="">${{ $cart->price * $cart->quantity }}</td>
                                    <td class="">
                                    <a class="product-remove" href="{{ route('site.remove_cart', $cart->id) }}">Remove</a>
                                    </td>
                                </tr>
                            @php
                                $total += $cart->quantity * $cart->price;
                            @endphp
                            @endforeach
                        @endauth
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="3">Total</th>
                            <th colspan="2">{{ number_format($total, 2) }}</th>
                        </tr>
                    </tfoot>
                  </table>
                  <a href="{{ route('site.checkout') }}" class="btn btn-main pull-right">Checkout</a>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


@stop
