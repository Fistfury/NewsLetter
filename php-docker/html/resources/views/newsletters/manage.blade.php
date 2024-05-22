<x-layout>
    <h1 class="text-2xl font-bold my-6 text-center">Manage My Newsletters</h1>
    <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="py-3 px-6">
                        Name
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Description
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Subscribers
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Actions
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($newsletters as $newsletter)
                <tr class="bg-white border-b hover:bg-gray-50">
                    <td class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap">
                        {{ $newsletter->name }}
                    </td>
                    <td class="py-4 px-6">
                        {{ $newsletter->description }}
                    </td>
                    <td class="py-4 px-6">
                        @foreach ($newsletter->subscribers as $subscriber)
                        <div>{{ $subscriber->email }}</div>
                    @endforeach
                    </td>
                    <td class="py-4 px-6">
                        <a href="{{ route('newsletters.edit', $newsletter) }}" class="font-medium text-blue-600 hover:underline">Edit</a>
                        <form action="{{ route('newsletters.destroy', $newsletter) }}" method="POST" onsubmit="return confirm('Are you sure?');" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline ml-4">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-layout>