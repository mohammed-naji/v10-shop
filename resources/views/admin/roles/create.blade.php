@extends('admin.master')

@section('title', 'Add new Role | ' . env('APP_NAME'))

@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Add new Role</h1>

<form action="{{ route('admin.roles.store') }}" method="POST" enctype="multipart/form-data">
@csrf

@include('admin.roles.form')

<button class="btn btn-success px-5">Add New</button>

</form>

@stop
