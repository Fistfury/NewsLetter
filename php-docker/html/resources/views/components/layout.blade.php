<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="{{ asset('images/favicon.ico') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
          integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
          crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="//unpkg.com/alpinejs" defer></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        newsletter: '#007ace', 
                    },
                },
            },
        };
    </script>
    <title>{{ config('app.name', 'Newsletter Hub') }}</title>
</head>
<body class="mb-48 bg-gray-100">
    <nav class="flex justify-between items-center mb-4 bg-newsletter p-4 text-white">
        <a href="/" class="flex-shrink-0">
            <img class="w-32 h-32" src="{{ asset('images/newsletter.png') }}" alt="Newsletter Hub Logo"/>
        </a>
        <ul class="flex items-center space-x-6 mr-6 text-lg">
            @auth
            <li class="flex items-center space-x-4">
                <span class="font-bold uppercase">Welcome {{ auth()->user()->first_name }}</span>
                <a href="{{ route('newsletters.manage') }}" class="hover:bg-gray-700 rounded-md px-3 py-2">
                    <i class="fa-solid fa-gear"></i> Manage Newsletters
                </a>
                
                <form class="inline" method="POST" action="/logout">
                    @csrf
                    <button type="submit" class="hover:bg-gray-700 rounded-md px-3 py-2">
                        <i class="fa-solid fa-door-closed"></i> Logout
                    </button>
                </form>
            </li>
            @else
            <li>
                <a href="/register" class="hover:bg-gray-700 rounded-md px-3 py-2"><i class="fa-solid fa-user-plus"></i> Register</a>
                <a href="/login" class="hover:bg-gray-700 rounded-md px-3 py-2"><i class="fa-solid fa-arrow-right-to-bracket"></i> Login</a>
            </li>
            @endauth
        </ul>
    </nav>
    <main>
        {{ $slot }}
    </main>
    <footer class="fixed bottom-0 left-0 w-full flex items-center justify-center font-bold bg-newsletter text-white h-24 opacity-90">
        <p class="ml-2">Copyright &copy; {{ date('Y') }}, {{ config('app.name') }}. All rights reserved.</p>
        <a href="/newsletters/create" class="absolute top-1/3 right-10 bg-black text-white py-2 px-5">Create Newsletter</a>
    </footer>

    <x-flash-message />
</body>
</html>