<x-layout>
    <a href="/" class="inline-block text-black ml-4 mb-4">
        <i class="fa-solid fa-arrow-left"></i> Back
    </a>
    <div class="mx-4">
        <x-card class="p-10 bg-black">
            <div class="flex flex-col items-center justify-center text-center">
                <img
                    class="w-48 mr-6 mb-6"
                    src="{{$newsletter->image ? asset('storage/' . $newsletter->image) : asset('images/no-image.png')}}"
                    alt="Newsletter Logo"
                />

                <h1 class="text-2xl mb-2">{{$newsletter->name}}</h3>
                <div class="text-xl font-bold mb-4">Hosted by {{$newsletter->user->first_name}}</div>

                <div class="text-lg my-4">
                    {{$newsletter->description}}
                </div>
                <div class="border border-gray-200 w-full mb-6"></div>
                <x-subscription-button :newsletter="$newsletter" />
            </div>
        </x-card>
    </div>
</x-layout>