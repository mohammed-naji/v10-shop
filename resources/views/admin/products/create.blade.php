@extends('admin.master')

@section('title', 'Add new Product | ' . env('APP_NAME'))

@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Add new Product</h1>

<form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
@csrf

@include('admin.products.form')

<button class="btn btn-success px-5">Add New</button>

</form>

@stop
