@props(['newsletter'])

<x-card>
    <div class="flex">
        <img
        class="hidden w-48 mr-6 md:block"
        src="{{ $newsletter->image ? asset('storage/' . $newsletter->image) : asset('images/no-image.png') }}"
        alt="Newsletter Image"
    />
        <div>
            <h3 class="text-2xl font-bold">
                <a href="{{ route('newsletters.show', $newsletter) }}">{{ $newsletter->name }}</a>
            </h3>
            <p class="text-lg mt-4">
                {{ $newsletter->description }}
            </p>
        </div>
    </div>
    <div class="text-right mt-4">
        <x-subscription-button :newsletter="$newsletter" />
    </div>
</x-card>