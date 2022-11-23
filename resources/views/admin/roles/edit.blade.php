@extends('admin.master')

@section('title', 'Edit Category | ' . env('APP_NAME'))

@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Edit Category</h1>

<form action="{{ route('admin.categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
@csrf
@method('put')

@include('admin.categories.form')

<button class="btn btn-success px-5">Update</button>

</form>

@stop
