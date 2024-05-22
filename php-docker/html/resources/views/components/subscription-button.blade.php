
@props(['newsletter'])

@php
    $isSubscribed = auth()->check() && auth()->user()->subscriptions()->where('newsletter_id', $newsletter->id)->exists();
@endphp
@auth
@if($isSubscribed)
<form action="{{ route('unsubscribe', $newsletter->id) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Unsubscribe</button>
</form>
@else
<form action="{{ route('subscribe', $newsletter->id) }}" method="POST">
    @csrf
    <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Subscribe</button>
</form>
@endif
@endauth

