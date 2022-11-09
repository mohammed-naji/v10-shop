<div class="product-item">
    <div class="product-thumb">
        @if ($product->sale_price)
        <span class="bage">Sale</span>
        @endif

        <img class="img-responsive" src="{{ asset('uploads/'.$product->image) }}" alt="product-img" />
    </div>
    <div class="product-content">
        <h4><a href="{{ route('site.product', $product->id) }}">{{ $product->$name }}</a></h4>
        <p class="price">
            @if ($product->sale_price)
                <small><del>${{ $product->price }}</del></small> ${{ $product->sale_price }}
            @else
            ${{ $product->price }}
            @endif
            {{-- {{ $product->sale_price ? $product->sale_price : $product->price }} --}}
        </p>
    </div>
</div>
