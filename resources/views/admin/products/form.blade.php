@php
    $name = 'name_'.app()->currentLocale();
@endphp

    <div class="row">
    <div class="col-md-6">
        <div class="mb-3">
            <label>English Name</label>
            <input type="text" name="name_en" placeholder="English Name" class="form-control @error('name_en') is-invalid @enderror " value="{{ old('name_en', $product->name_en) }}" />
            @error('name_en')
                <small class="invalid-feedback">{{ $message }}</small>
            @enderror
        </div>
    </div>

    <div class="col-md-6">
        <div class="mb-3">
            <label>Arabic Name</label>
            <input type="text" name="name_ar" placeholder="Arabic Name" class="form-control @error('name_ar') is-invalid @enderror " value="{{ old('name_ar', $product->name_ar) }}" />
            @error('name_ar')
                <small class="invalid-feedback">{{ $message }}</small>
            @enderror
        </div>
    </div>

    <div class="col-md-12">
        <div class="mb-3">
            <label>Image</label>
            <input type="file" name="image" class="form-control @error('image') is-invalid @enderror " />
            <img width="80" src="{{ asset('uploads/'.$product->image) }}" alt="">
            @error('image')
                <small class="invalid-feedback">{{ $message }}</small>
            @enderror
        </div>
    </div>

    <div class="col-md-6">
        <div class="mb-3">
            <label>English Content</label>
            <textarea name="content_en" placeholder="English Content" class="form-control @error('content_en') is-invalid @enderror " rows="5">{{ old('content_en', $product->content_en) }}</textarea>
            @error('content_en')
                <small class="invalid-feedback">{{ $message }}</small>
            @enderror
        </div>
    </div>

    <div class="col-md-6">
        <div class="mb-3">
            <label>Arabic Content</label>
            <textarea name="content_ar" placeholder="Arabic Content" class="form-control @error('content_ar') is-invalid @enderror " rows="5">{{ old('content_ar', $product->content_ar) }}</textarea>
            @error('content_ar')
                <small class="invalid-feedback">{{ $message }}</small>
            @enderror
        </div>
    </div>

    <div class="col-md-3">
        <div class="mb-3">
            <label>Price</label>
            <input type="number" name="price" placeholder="Price" class="form-control @error('price') is-invalid @enderror " value="{{ old('price', $product->price) }}" />
            @error('price')
                <small class="invalid-feedback">{{ $message }}</small>
            @enderror
        </div>
    </div>

    <div class="col-md-3">
        <div class="mb-3">
            <label>Sale Price</label>
            <input type="number" name="sale_price" placeholder="Sale Price" class="form-control @error('sale_price') is-invalid @enderror " value="{{ old('sale_price', $product->sale_price) }}" />
            @error('sale_price')
                <small class="invalid-feedback">{{ $message }}</small>
            @enderror
        </div>
    </div>

    <div class="col-md-3">
        <div class="mb-3">
            <label>Quantity</label>
            <input type="number" name="quantity" placeholder="Quantity" class="form-control @error('quantity') is-invalid @enderror " value="{{ old('quantity', $product->quantity) }}" />
            @error('quantity')
                <small class="invalid-feedback">{{ $message }}</small>
            @enderror
        </div>
    </div>

    <div class="col-md-3">
        <div class="mb-3">
            <label>Category</label>
            <select name="category_id" class="form-control @error('category_id') is-invalid @enderror">
                <option value="">Select Category</option>
                @foreach ($categories as $item)
                    <option {{ $product->category_id == $item->id ? 'selected' : '' }} value="{{ $item->id }}">{{ $item->$name }}</option>
                @endforeach
            </select>

            @error('category_id')
                <small class="invalid-feedback">{{ $message }}</small>
            @enderror
        </div>
    </div>


</div>
