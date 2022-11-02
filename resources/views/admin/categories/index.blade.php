@extends('admin.master')

@section('title', 'Categories | ' . env('APP_NAME'))

@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">All Categories</h1>

@if (session('msg'))
    <div class="alert alert-{{ session('type') }}">{{ session('msg') }}</div>
@endif

<table class="table table-hover table-striped table-bordered">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Image</th>
        <th>Created At</th>
        <th>Updated At</th>
        <th>Actions</th>
    </tr>
    @forelse ($categories as $category)
    @php
        $name = 'name_'.app()->currentLocale();
    @endphp
    <tr>
        <td>{{ $category->id }} {{ $name }}</td>
        {{-- <td>{{ $category->{'name_'.app()->currentLocale()} }}</td> --}}
        <td>{{ $category->$name }}</td>
        <td><img width="80" src="{{ asset('uploads/'.$category->image) }}" alt=""></td>
        <td>{{ $category->created_at->format('d/m/Y') }}</td>
        <td>{{ $category->updated_at->diffForhumans(); }}</td>
        <td>
            <a class="btn btn-primary btn-sm" href="{{ route('admin.categories.edit', $category->id) }}"><i class="fas fa-edit"></i></a>
            <form class="d-inline" action="{{ route('admin.categories.destroy', $category->id) }}" method="POST">
            @csrf
            @method('delete')
            <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')"><i class="fas fa-trash"></i></button>
            </form>
        </td>
    </tr>
    @empty
    <tr>
        <td style="text-align: center" colspan="6">No Data Aviable</td>
    </tr>
    @endforelse

</table>

{{ $categories->links() }}

@stop
