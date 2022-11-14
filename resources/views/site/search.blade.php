@extends('site.master')

@section('title', 'Shop | ' . env('APP_NAME'))

@php
    $name = 'name_'.app()->currentLocale();
@endphp

@section('content')
<section class="page-header">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="content">
					<h1 class="page-name">{{ __('site.search_result') }} : {{ request()->keyword }}</h1>
                    <br>
                    <form action="{{ route('site.search') }}" method="GET">
                        <div class="input-group">
                            <input type="search"
                            class="form-control" placeholder="Search..."
                            name="keyword"
                            value="{{ request()->keyword }}"
                            style="height: 45px"
                            >
                            <span class="input-group-btn">
                            <button style="padding: 14px 60px;" class="btn btn-main" type="button">Go!</button>
                            </span>
                        </div><!-- /input-group -->
                    </form>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="products section">
	<div class="container">
		<div class="row">

			@foreach ($products as $product)
            <div class="col-md-4">
                @include('site.parts.product_box')
			</div>
            @endforeach
		</div>
	</div>
</section>


@stop
