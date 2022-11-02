@extends('admin.master')

@section('title', 'Add new Category | ' . env('APP_NAME'))

@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Add new Category</h1>

<form action="{{ route('admin.categories.store') }}" method="POST" enctype="multipart/form-data">
@csrf

@include('admin.categories.form')

<button class="btn btn-success px-5">Add New</button>

</form>

@stop
