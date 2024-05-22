<x-layout>
    <x-card class="p-10 max-w-lg mx-auto mt-24">
     <header class="text-center">
         <h2 class="text-2xl font-bold uppercase mb-1">
             Register
         </h2>
         <p class="mb-4">Create an account to manage newsletters</p>
     </header>
 
     <form method="POST" action="/users">
         @csrf
         <div class="mb-6">
             <label for="first_name" class="inline-block text-lg mb-2">First Name</label>
             <input type="text" class="border border-gray-200 rounded p-2 w-full" name="first_name" value="{{ old('first_name') }}" required />
             @error('first_name')
             <p class="text-red-500 text-xs mt-1">{{$message}}</p>
             @enderror
         </div>
 
         <div class="mb-6">
             <label for="last_name" class="inline-block text-lg mb-2">Last Name</label>
             <input type="text" class="border border-gray-200 rounded p-2 w-full" name="last_name" value="{{ old('last_name') }}" required />
             @error('last_name')
             <p class="text-red-500 text-xs mt-1">{{$message}}</p>
             @enderror
         </div>
 
         <!-- Email Input -->
         <div class="mb-6">
             <label for="email" class="inline-block text-lg mb-2">Email</label>
             <input type="email" class="border border-gray-200 rounded p-2 w-full" name="email" value="{{ old('email') }}" required />
             @error('email')
             <p class="text-red-500 text-xs mt-1">{{$message}}</p>
             @enderror
         </div>

         <!-- Role Selection -->
         <div class="mb-6">
             <label for="role" class="inline-block text-lg mb-2">Role</label>
             <select name="role" class="border border-gray-200 rounded p-2 w-full" required>
                 <option value="">Select a role</option>
                 <option value="subscriber">Subscriber</option>
                 <option value="customer">Customer</option>
                     <option value="both">Both</option>
             </select>
             @error('role')
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
 
         <!-- Confirm Password Input -->
         <div class="mb-6">
             <label for="password_confirmation" class="inline-block text-lg mb-2">Confirm Password</label>
             <input type="password" class="border border-gray-200 rounded p-2 w-full" name="password_confirmation" required />
         </div>
 
         <!-- Submit Button -->
         <div class="mb-6">
             <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Sign Up</button>
         </div>
 
          <!-- GDPR Agreement Checkbox -->
          <div class="mb-6">
            <label for="agreement" class="inline-block text-lg mb-2">
                I agree to personal data handling according to GDPR
            </label>
            <input type="checkbox" name="agreement" id="agreement" required class="align-middle">
            @error('agreement')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
        </div>
        
         <!-- Login Link -->
         <div class="mt-8">
             <p>Already have an account? <a href="/login" class="text-blue-500 hover:text-blue-700">Login</a></p>
         </div>
     </form>
    </x-card>
 </x-layout>