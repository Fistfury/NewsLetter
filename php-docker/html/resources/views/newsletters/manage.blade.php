
<x-layout>
    <h1>Manage My Newsletters</h1>
    <table class="min-w-full leading-normal">
        <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Subscribers</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($newsletters as $newsletter)
            <tr>
                <td>{{ $newsletter->name }}</td>
                <td>{{ $newsletter->description }}</td>
                <td>{{ $newsletter->subscribers->count() }}</td>
                <td>
                    <a href="{{ route('newsletters.edit', $newsletter) }}">Edit</a>
                    <form action="{{ route('newsletters.destroy', $newsletter) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</x-layout>