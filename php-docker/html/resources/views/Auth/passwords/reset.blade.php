<x-layout>
    <x-card class="p-10 max-w-lg mx-auto mt-24">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">Set New Password</h2>
            <p class="mb-4">Enter your new password below.</p>
        </header>

        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $token }}">
            <input type="hidden" name="email" value="{{ $email }}">

            <!-- Password Input -->
            <div class="mb-6">
                <label for="password" class="inline-block text-lg mb-2">New Password</label>
                <input type="password" class="border border-gray-200 rounded p-2 w-full" name="password" required />
                @error('password')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Confirm Password Input -->
            <div class="mb-6">
                <label for="password_confirmation" class="inline-block text-lg mb-2">Confirm New Password</label>
                <input type="password" class="border border-gray-200 rounded p-2 w-full" name="password_confirmation" required />
                @error('password_confirmation')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Submit Button -->
            <div class="mb-6">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Reset Password</button>
            </div>
        </form>
    </x-card>
</x-layout>