<x-layout>
    <h1>My Subscriptions</h1>
    <table class="min-w-full leading-normal">
        <thead>
            <tr>
                <th>Newsletter Name</th>
                <th>Subscribed Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($subscriptions as $subscription)
            <tr>
                <td>{{ $subscription->newsletter->name }}</td>
                <td>{{ $subscription->created_at->format('Y-m-d') }}</td>
                <td>
                    <form action="{{ route('subscriptions.unsubscribe', $subscription->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Unsubscribe</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</x-layout>