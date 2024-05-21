@props(['newsletter'])

<x-card>
    <div class="flex">
        <!-- Optionally include an image if your newsletters have associated images -->
        <img
            class="hidden w-48 mr-6 md:block"
            src="{{ $newsletter->image ? asset('storage/' . $newsletter->image) : asset('images/no-image.png') }}"
            alt="Newsletter Image"
        />
        <div>
            <h3 class="text-2xl font-bold">
                <a href="{{ route('newsletters.show', $newsletter) }}">{{ $newsletter->name }}</a>
            </h3>
            <div class="text-lg mt-4">
                {{ $newsletter->description }}
            </div>
        </div>
    </div>
</x-card>