@extends('site.master')

@section('content')

<section class="products section">
	<div class="container">
        <h3>New Notifications ( {{ Auth::user()->unreadnotifications->count() }} )</h3>
        <div class="list-group">
            @foreach (Auth::user()->notifications as $item)
                {{-- @dump($item->data['data']) --}}
            <a href="{{ route('read_notify', $item->id) }}" class="list-group-item {{ $item->read_at ? '' : 'active' }}">{{ $item->data['data'] }}</a>
            @endforeach

        </div>
    </div>
</section>
@stop
