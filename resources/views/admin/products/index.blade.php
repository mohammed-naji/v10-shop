@extends('admin.master')

@section('title', 'Products | ' . env('APP_NAME'))

@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">All Products</h1>

@if (session('msg'))
    <div class="alert alert-{{ session('type') }}">{{ session('msg') }}</div>
@endif

<table class="table table-hover table-striped table-bordered">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Image</th>
        <th>Price</th>
        <th>Sale Price</th>
        <th>Quantity</th>
        <th>Category</th>
        <th>Created At</th>
        <th>Updated At</th>
        <th>Actions</th>
    </tr>
    @forelse ($products as $product)
    @php
        $name = 'name_'.app()->currentLocale();
    @endphp
    <tr>
        <td>{{ $product->id }}</td>
        {{-- <td>{{ $product->{'name_'.app()->currentLocale()} }}</td> --}}
        <td>{{ $product->$name }}</td>
        <td><img width="80" src="{{ asset('uploads/'.$product->image) }}" alt=""></td>
        <td>{{ $product->price }}</td>
        <td>{{ $product->sale_price }}</td>
        <td>{{ $product->quantity }}</td>
        <td>{{ $product->category->$name }}</td>
        <td>{{ $product->created_at->format('d/m/Y') }}</td>
        <td>{{ $product->updated_at->diffForhumans(); }}</td>
        <td>
            <a class="btn btn-primary btn-sm" href="{{ route('admin.products.edit', $product->id) }}"><i class="fas fa-edit"></i></a>
            <form class="d-inline" action="{{ route('admin.products.destroy', $product->id) }}" method="POST">
            @csrf
            @method('delete')
            <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')"><i class="fas fa-trash"></i></button>
            </form>
        </td>
    </tr>
    @empty
    <tr>
        <td style="text-align: center" colspan="10">No Data Aviable</td>
    </tr>
    @endforelse

</table>

{{ $products->links() }}

@stop
