@extends('admin.master')

@section('title', 'Roles | ' . env('APP_NAME'))

@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">All Roles</h1>

@if (session('msg'))
    <div class="alert alert-{{ session('type') }}">{{ session('msg') }}</div>
@endif

<table class="table table-hover table-striped table-bordered">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Created At</th>
        <th>Updated At</th>
        <th>Actions</th>
    </tr>
    @forelse ($roles as $role)
    <tr>
        <td>{{ $role->id }}</td>
        <td>{{ $role->name }}</td>
        <td>{{ $role->created_at->format('d/m/Y') }}</td>
        <td>{{ $role->updated_at->diffForhumans(); }}</td>
        <td>
            <a class="btn btn-primary btn-sm" href="{{ route('admin.roles.edit', $role->id) }}"><i class="fas fa-edit"></i></a>
            <form class="d-inline" action="{{ route('admin.roles.destroy', $role->id) }}" method="POST">
            @csrf
            @method('delete')
            <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')"><i class="fas fa-trash"></i></button>
            </form>
        </td>
    </tr>
    @empty
    <tr>
        <td style="text-align: center" colspan="5">No Data Aviable</td>
    </tr>
    @endforelse

</table>

{{ $roles->links() }}

@stop
