@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    @auth
        <h1 class="text-xl font-bold">Welcome, {{ Auth::user()->first_name }}!</h1>
        <div class="mt-6">
            <p>You are logged in as a {{ Auth::user()->role }}.</p>
            @if(Auth::user()->role == 'customer')
                <a href="{{ url('/newsletters/manage') }}" class="text-blue-500 hover:text-blue-700">Manage Your Newsletters</a>
            @else
                <a href="{{ url('/subscriptions/manage') }}" class="text-blue-500 hover:text-blue-700">View Your Subscriptions</a>
            @endif
        </div>
    @endauth
</div>
@endsection