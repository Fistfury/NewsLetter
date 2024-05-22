<x-layout>
    <h1 class="text-2xl font-bold my-6 text-center">My Subscriptions</h1>
    <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="py-3 px-6">
                        Newsletter Name
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Subscribed Date
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($subscriptions as $subscription)
                <tr class="bg-white border-b hover:bg-gray-50">
                    <td class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap">
                        {{ $subscription->newsletter->name }}
                    </td>
                    <td class="py-4 px-6">
                        {{ $subscription->subscribed_at->format('Y-m-d') }}
                    </td>
                    <td class="py-4 px-6">
                        <form action="{{ route('unsubscribe', $subscription->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to unsubscribe?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline">Unsubscribe</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-layout>