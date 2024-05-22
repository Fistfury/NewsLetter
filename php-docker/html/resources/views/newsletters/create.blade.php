<x-layout>
    <x-card class="p-10 max-w-lg mx-auto mt-24">
     <header class="text-center">
         <h2 class="text-2xl font-bold uppercase mb-1">
             Create a Newsletter
         </h2>
         <p class="mb-4">Craft and send your newsletter</p>
     </header>
 
     <form method="POST" action="/newsletters" enctype="multipart/form-data">
         @csrf
         <div class="mb-6">
             <label for="name" class="inline-block text-lg mb-2">
                 Newsletter Title
             </label>
             <input type="text" class="border border-gray-200 rounded p-2 w-full" name="name" value="{{ old('name') }}" required />
             @error('name')
             <p class="text-red-500 text-xs mt-1">{{$message}}</p>
             @enderror
         </div>
 
         <div class="mb-6">
             <label for="description" class="inline-block text-lg mb-2">
                 Description
             </label>
             <textarea class="border border-gray-200 rounded p-2 w-full" name="description" rows="4" required>{{ old('description') }}</textarea>
             @error('description')
             <p class="text-red-500 text-xs mt-1">{{$message}}</p>
             @enderror
         </div>
 
         <div class="mb-6">
             <label for="image" class="inline-block text-lg mb-2">
                 Upload Image (Optional)
             </label>
             <input type="file" class="border border-gray-200 rounded p-2 w-full" name="image" />
             @error('image')
             <p class="text-red-500 text-xs mt-1">{{$message}}</p>
             @enderror
         </div>
 
         <div class="mb-6">
             <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white rounded py-2 px-4">
                 Publish Newsletter
             </button>
 
             <a href="/" class="text-black ml-4"> Back </a>
         </div>
     </form>
    </x-card>
 </x-layout>