@extends('site.master')

@section('title', 'Product | ' . env('APP_NAME'))

@php
    $name = 'name_' . app()->currentLocale();
    $content = 'content_' . app()->currentLocale();
@endphp

@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
    @import url(//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css);

fieldset, label { margin: 0; padding: 0; }
body{ margin: 20px; }
h1 { font-size: 1.5em; margin: 10px; }

/****** Style Star Rating Widget *****/

.rating {
  border: none;
  float: left;
}

.rating > input { display: none; }
.rating > label:before {
  margin: 5px;
  font-size: 1.25em;
  font-family: FontAwesome;
  display: inline-block;
  content: "\f005";
}

.rating > .half:before {
  content: "\f089";
  position: absolute;
}

.rating > label {
  color: #ddd;
 float: right;
}

/***** CSS Magic to Highlight Stars on Hover *****/

.rating > input:checked ~ label, /* show gold star when clicked */
.rating:not(:checked) > label:hover, /* hover current star */
.rating:not(:checked) > label:hover ~ label { color: #FFD700;  } /* hover previous stars in list */

.rating > input:checked + label:hover, /* hover current star when changing rating */
.rating > input:checked ~ label:hover,
.rating > label:hover ~ input:checked ~ label, /* lighten current selection */
.rating > input:checked ~ label:hover ~ label { color: #FFED85;  }
</style>
@stop

@section('content')

    <section class="single-product">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <ol class="breadcrumb">
                        <li><a href="{{ route('site.home') }}">Home</a></li>
                        <li><a href="{{ route('site.shop') }}">Shop</a></li>
                        <li class="active">{{ $product->$name }}</li>
                    </ol>
                </div>
                <div class="col-md-6">
                    <ol class="product-pagination text-right">
                        @if ($next)
                            <li><a href="{{ route('site.product', $next->id) }}"><i class="tf-ion-ios-arrow-left"></i> Next
                                </a></li>
                        @endif

                        @if ($prev)
                            <li><a href="{{ route('site.product', $prev->id) }}">Preview <i
                                        class="tf-ion-ios-arrow-right"></i></a></li>
                        @endif

                    </ol>
                </div>
            </div>
            <div class="row mt-20">
                <div class="col-md-5">
                    <div class="single-product-slider">
                        <img class="img-responsive" src="{{ asset('uploads/' . $product->image) }}" alt="">
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="single-product-details">
                        <h2>{{ $product->$name }}</h2>
                        {{-- <i class="tf-ion-star"></i> {{ round($product->reviews->avg('star') / 2, 2) }} --}}
                        @php $rating = round($product->reviews->avg('star') / 2, 2); @endphp

                        @if ($rating > 2)


                        @foreach(range(1,5) as $i)
                            <span class="fa-stack" style="width:1em">
                                <i class="far fa-star fa-stack-1x"></i>

                                @if($rating >0)
                                    @if($rating >0.5)
                                        <i class="fas fa-star fa-stack-1x"></i>
                                    @else
                                        <i class="fas fa-star-half fa-stack-1x"></i>
                                    @endif
                                @endif
                                @php $rating--; @endphp
                            </span>
                        @endforeach

                        {{ round($product->reviews->avg('star') / 2, 2)  }} Based on {{ $product->reviews->count() }} Reviews

                        @else
                        <p>Not review yet</p>
                        @endif

                        <p class="product-price">${{ $product->sale_price ? $product->sale_price : $product->price }}</p>

                        <p class="product-description mt-20">
                            {{ Str::words($product->$content, 40, '...') }}
                        </p>
                        {{-- <div class="color-swatches">
						<span>color:</span>
						<ul>
							<li>
								<a href="#!" class="swatch-violet"></a>
							</li>
							<li>
								<a href="#!" class="swatch-black"></a>
							</li>
							<li>
								<a href="#!" class="swatch-cream"></a>
							</li>
						</ul>
					</div> --}}
                        {{-- <div class="product-size">
						<span>Size:</span>
						<select class="form-control">
							<option>S</option>
							<option>M</option>
							<option>L</option>
							<option>XL</option>
						</select>
					</div> --}}

                        <div class="product-category">
                            <span>Categories:</span>
                            <ul>
                                <li><a href="product-single.html">{{ $product->category->$name }}</a></li>
                            </ul>
                        </div>
                        <div class="product-quantity">
                            <span>Quantity:</span>
                            <div class="product-quantity-slider">
                                <input id="product-quantity" type="text" value="0" name="product-quantity">
                            </div>
                        </div>
                        <a href="cart.html" class="btn btn-main mt-20">Add To Cart</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <div class="tabCommon mt-20">
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#details" aria-expanded="true">Details</a></li>
                            <li class=""><a data-toggle="tab" href="#reviews" aria-expanded="false">Reviews
                                    ({{ $product->reviews->count() }})</a></li>
                        </ul>
                        <div class="tab-content patternbg">
                            <div id="details" class="tab-pane fade active in">
                                <h4>Product Description</h4>
                                {{ $product->$content }}
                            </div>
                            <div id="reviews" class="tab-pane fade">
                                <div class="post-comments">
                                    <ul class="media-list comments-list m-bot-50 clearlist">
                                        <!-- Comment Item start-->
                                        @foreach ($product->reviews as $review)
                                            <li class="media">
                                                <a class="pull-left" href="#!">
                                                    <img class="media-object comment-avatar"
                                                        src="https://ui-avatars.com/api/?name={{ $review->user->name }}&background=random"
                                                        alt="" width="50" height="50">
                                                </a>

                                                <div class="media-body">

                                                    <div class="comment-info">
                                                        <div class="comment-author">
                                                            <a href="#!">{{ $review->user->name }}</a>
                                                        </div>
                                                        <time
                                                            datetime="2013-04-06T13:53">{{ $review->created_at->format('F d, Y') }},
                                                            at {{ $review->created_at->format('h:i') }}</time>
                                                        <a class="comment-button" href="#!"><i class="tf-ion-star"></i>
                                                            {{ $review->star / 2 }}</a>
                                                    </div>

                                                    <p>
                                                        {{ $review->content }}
                                                    </p>

                                                </div>

                                            </li>
                                        @endforeach

                                    </ul>

                                    @if (Auth::check())
                                    <hr>
                                    <h4>Post New Review</h4>
                                    <form action="{{ route('site.review', $product->id) }}" method="POST">
                                        @csrf
                                        <fieldset class="rating">
                                            <input type="radio" id="star5" name="rating" value="10" /><label
                                                class="full" for="star5" title="Awesome - 5 stars"></label>
                                            <input type="radio" id="star4half" name="rating"
                                                value="9" /><label class="half" for="star4half"
                                                title="Pretty good - 4.5 stars"></label>
                                            <input type="radio" id="star4" name="rating" value="8" /><label
                                                class="full" for="star4" title="Pretty good - 4 stars"></label>
                                            <input type="radio" id="star3half" name="rating"
                                                value="7" /><label class="half" for="star3half"
                                                title="Meh - 3.5 stars"></label>
                                            <input type="radio" id="star3" name="rating" value="6" /><label
                                                class="full" for="star3" title="Meh - 3 stars"></label>
                                            <input type="radio" id="star2half" name="rating"
                                                value="5" /><label class="half" for="star2half"
                                                title="Kinda bad - 2.5 stars"></label>
                                            <input type="radio" id="star2" name="rating" value="4" /><label
                                                class="full" for="star2" title="Kinda bad - 2 stars"></label>
                                            <input type="radio" id="star1half" name="rating"
                                                value="3" /><label class="half" for="star1half"
                                                title="Meh - 1.5 stars"></label>
                                            <input type="radio" id="star1" name="rating" value="2" /><label
                                                class="full" for="star1" title="Sucks big time - 1 star"></label>
                                            <input type="radio" id="starhalf" name="rating" value="1" /><label
                                                class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
                                        </fieldset>

                                        <textarea class="form-control" placeholder="Write your review here.." rows="5" name="content"></textarea>
                                        <button class="btn btn-main mt-20">Post</button>
                                    </form>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @if ($related->count() > 0)
    <section class="products related-products section">
        <div class="container">
            <div class="row">
                <div class="title text-center">
                    <h2>Related Products</h2>
                </div>
            </div>
            <div class="row">
                @foreach ($related as $product)
                <div class="col-md-3">
                    @include('site.parts.product_box')

                </div>
                @endforeach

            </div>
        </div>
    </section>
    @endif



@stop
