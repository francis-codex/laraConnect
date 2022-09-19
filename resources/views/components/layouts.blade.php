<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="icon" href="images/favicon.ico" />
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
            integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer"
        />
        <script src="//unpkg.com/alpinejs" defer></script>
        <script src="https://cdn.tailwindcss.com"></script>
        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        colors: {
                            laravel: "#ef3b2d",
                        },
                    },
                },
            };
        </script>
        <title>LaraConnects | Find Laravel Jobs & Projects</title>
    </head>
    <body class="mb-48">
        <nav class="flex justify-between items-center mb-4">
            <a href="/"
                ><img class="w-24" src="{{asset('images/me logo.png')}}" alt="" class="logo"
            /></a>
            <ul class="flex space-x-6 mr-6 text-lg">
                 @auth
                <li>
                    <span class="font-bold uppercase">
                         {{auth()->user()->name}}
                    </span>
                </li>
                
                <li>
                    <form class="inline" method="post" action="/logout">
                        @csrf
                        <button type="submit">
                            <i class="fa-solid fa-door-closed"></i> Logout
                        </button>
                    </form>
                </li>
                @else
                <li>
                    <a href="/register" class="hover:text-laravel"
      
                   ><i class="fa-solid fa-user"></i> Sign-up</a>
                </li>
                <li>
                    <a href="/login" class="hover:text-laravel"
                        ><i class="fa-solid fa-arrow-right"></i>
                        Log-in</a>
                </li>
                @endauth
            </ul>
        </nav>
        <main>
           {{$slot}}
        </main>

    <footer
    class="fixed bottom-0 left-0 w-full flex items-center justify-start font-bold bg-black text-white h-24 mt-50 opacity-80 md:justify-center"
>
    <p class="ml-2">Copyright &copy; 2022, Private Property</p>

    <a
        href="/listings/create"
        class="absolute top-1/3 right-10 bg-laravel rounded-lg text-white py-2 px-5"
        >@Post Job</a
    >
    <x-flash-message />
    </footer>
</body>
</html>