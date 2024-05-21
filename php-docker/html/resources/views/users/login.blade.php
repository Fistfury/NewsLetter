<x-layout>
    <x-card class="p-10 max-w-lg mx-auto mt-24">
     <header class="text-center">
         <h2 class="text-2xl font-bold uppercase mb-1">
             Login
         </h2>
         <p class="mb-4">Access your account</p>
     </header>
 
     <form method="POST" action="/users/authenticate">
         @csrf
 
         <!-- Email Input -->
         <div class="mb-6">
             <label for="email" class="inline-block text-lg mb-2">Email</label>
             <input type="email" class="border border-gray-200 rounded p-2 w-full" name="email" required />
             @error('email')
             <p class="text-red-500 text-xs mt-1">{{$message}}</p>
             @enderror
         </div>
 
         <!-- Password Input -->
         <div class="mb-6">
             <label for="password" class="inline-block text-lg mb-2">Password</label>
             <input type="password" class="border border-gray-200 rounded p-2 w-full" name="password" required />
             @error('password')
             <p class="text-red-500 text-xs mt-1">{{$message}}</p>
             @enderror
         </div>
 
         <!-- Remember Me Checkbox -->
         <div class="mb-6">
             <input type="checkbox" name="remember" id="remember" class="mr-2">
             <label for="remember" class="text-lg">Remember me</label>
         </div>
 
         <!-- Submit Button -->
         <div class="mb-6">
             <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Log In</button>
         </div>
 
         <!-- Register Link -->
         <div class="mt-8">
             <p>Don't have an account? <a href="/register" class="text-blue-500 hover:text-blue-700">Sign up</a></p>
         </div>
     </form>
    </x-card>
 </x-layout>