<x-layout>
    @include('partials._hero')
    <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">
        @unless($newsletters->isEmpty())

            @foreach($newsletters as $newsletter)

                <x-newsletter-card :newsletter="$newsletter" />
             
            @endforeach
        @else
            <p>No newsletters found.</p>
        @endunless
    </div>
    <div class="mt-6 p-4">
        {{ $newsletters->links() }}
    </div>
</x-layout>