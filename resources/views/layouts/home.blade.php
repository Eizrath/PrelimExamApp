<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? 'Page Title' }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        function toggleMenu() {
            document.getElementById('mobile-menu').classList.toggle('hidden');
        }
        document.addEventListener("DOMContentLoaded", function() {
            let links = document.querySelectorAll(".nav-link");
            links.forEach(link => {
                if (link.href === window.location.href) {
                    link.classList.add("bg-blue-900", "text-white", "rounded");
                }
            });
        });
    </script>
</head>

<body class="h-screen w-full bg-[#fff9f3]">
    <header class="bg-blue-700 text-white shadow-lg">
        <div class="container mx-auto p-4 flex justify-between items-center">
            
            {{-- Logo sana --}}
            <div class="text-2xl font-bold">
                <a href="/">Prelim Exam Crud</a>
            </div>

            {{-- Nav --}}
            <nav class="hidden md:flex space-x-6">
                <a href="/" class="nav-link px-4 py-2 hover:bg-blue-900 hover:text-white rounded">Home</a>
                <a href="/homeowners/create" class="nav-link px-4 py-2 hover:bg-blue-900 hover:text-white rounded">Add</a>
            </nav>

            {{-- For future login/signup --}}
            {{-- <div class="hidden md:flex space-x-4">
                <a href="/login" class="nav-link px-4 py-2 hover:underline">Login</a>
                <a href="/signup" class="nav-link px-4 py-2 hover:underline">Signup</a>
            </div> --}}

            {{-- Respo Nav --}}
            <button class="md:hidden p-2 rounded focus:outline-none" onclick="toggleMenu()">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 6h16M4 12h16m-7 6h7">
                    </path>
                </svg>
            </button>
        </div>

        {{-- Mobile --}}
        <div id="mobile-menu" class="md:hidden hidden bg-blue-800 p-4">
            <a href="/" class="nav-link block py-2 hover:bg-blue-900 rounded">Home</a>
            <a href="/homeowners/create" class="nav-link block py-2 hover:bg-blue-900 rounded">Add</a>
        </div>
    </header>

    <main class="container mx-auto p-6">
        @yield('content')
    </main>
</body>

</html>
