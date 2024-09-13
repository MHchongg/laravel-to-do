<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel To Do</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    @vite(['resources/css/app.css'])
</head>

<body class="flex flex-col min-h-screen font-work-sans">

    <header class="flex justify-between p-3 space-x-2">
        <div>
            <a href="/" class="font-bold text-2xl">To Do App</a>
        </div>

        <nav>
            <ul class="w-full h-full flex items-center space-x-4">
                @guest
                    <li><a href="/login" class="hover:font-bold">Log In</a></li>
                    <li><a href="/register" class="hover:font-bold">Register</a></li>   
                @endguest
                @auth
                    <form method="POST" action="/logout">
                        @csrf
                        <input type="submit" value="Log Out" class="cursor-pointer hover:font-bold" />
                    </form>
                @endauth
            </ul>
        </nav>
    </header>

    <main class="bg-neutral-200 flex-grow">
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            {{ $slot }}
        </div>
    </main>

    <footer class="mt-auto font-bold text-center p-3">
        Developed by Chong MH
    </footer>
</body>

</html>
