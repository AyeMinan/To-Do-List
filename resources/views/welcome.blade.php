<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">


        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
            <!-- Link to Poppins font from Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">

        <style>
            body{
                background-color: #FAF3F0;
                font-family: "Poppins", "Times New Roman", sans-serif;
                /* display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0; */
            }
            .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 500px; /* Adjust as needed */
            width: 1000px; /* Ensure the container doesn't exceed the viewport width */
            margin: 0 auto;
            text-align: center; /* Align the image horizontally in the container */
            border: 1px solid #ccc;
            margin-bottom: 20px; /* Optional: add a border for visualization */
        }
        img {
            width: 100%;
            height: 100%;

        }
            h1{
                text-align: center;
                font-size: 2.2rem;
                margin-top: 100px;

            }
            p{
                text-align: center;
                font-size: 1.1rem;
                margin-bottom: 20px;
            }
            .text-right {
    text-align: right;
}

.text-left {
    text-align: left;
}

.font-semibold {
    font-weight: 600;
}

.text-gray-600 {
    color: rgba(75, 85, 99, var(--tw-text-opacity));
}

.text-gray-900 {
    color: rgba(17, 24, 39, var(--tw-text-opacity));
}

.hover\:text-gray-900:hover {
    --tw-text-opacity: 1;
    color: rgb(17 24 39 / var(--tw-text-opacity));
}

.hover\:text-gray-700:hover {
    --tw-text-opacity: 1;
    color: rgb(55 65 81 / var(--tw-text-opacity));
}

.focus\:outline-red-500:focus {
    outline-color: #ef4444;
}
.flex {
                display: flex;
            }

            .justify-content-center {
                justify-content: center;
            }

            .align-items-center {
                align-items: center;
            }

            .text-center {
                text-align: center;
            }
            a{
                text-decoration: none;
            }
            .flex button{
                margin-bottom: 1rem;
                width: 100px;
                 height: 30px;
                  border-radius: 10px;
                   background-color:black;
                   color: white;
                   font-size: 1rem;
                   cursor: pointer;

            }
            .flex button:hover{
                background-color: white;
                color: black;
                transition:cubic-bezier(1, 0, 0, 1);
            }
            </style>


    </head>
    <body class="antialiased">
        <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
            @if (Route::has('login'))
                <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                        @endif
                    @endauth
                </div>

            @endif

                <div>
                    <h1>Collocate Your Work and, <br> Overcome Misschedule.</h1>
                </div>
                <div>
                    <p>
                        Effortlessly manage your tasks and stay organized with <br> our intuitive to-do list website.
                    </p>
                </div>
                <div class="flex justify-content-center align-items-center text-center">
                    <a href="/main"><button >Start Now</button></a>


                </div>
                <div class="container">
                    <img src="/images/todophoto.png" alt="Todo Photo">
                </div>
<x-footer></x-footer>
    </body>
</html>
