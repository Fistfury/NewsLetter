<x-layout>
    <x-card class="p-10 max-w-lg mx-auto mt-24">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">Reset Password</h2>
            <p class="mb-4">Enter your email address to request a reset link.</p>
        </header>

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email Input -->
            <div class="mb-6">
                <label for="email" class="inline-block text-lg mb-2">Email</label>
                <input type="email" class="border border-gray-200 rounded p-2 w-full" name="email" required />
                @error('email')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Submit Button -->
            <div class="mb-6">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Send Password Reset Link</button>
            </div>
        </form>
    </x-card>
</x-layout>