<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>تصفح | @yield('title')</title>
  <script src="https://cdn.tailwindcss.com"></script>
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9.0.0/swiper-bundle.min.css">
    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@9.0.0/swiper-bundle.min.js"></script>
    <!-- BoxIcons CSS -->
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

  <style>
    @import url('https://fonts.googleapis.com/css2?family=Cairo:wght@400;700&display=swap');
    body {
      font-family: 'Cairo', sans-serif;
    }
  </style>
</head>
<body class="bg-gray-100">

    <header class="bg-black shadow-2xl fixed w-full z-50 top-0 left-0 rounded-lg">
        <div class="container mx-auto flex justify-between items-center px-6 py-4">
            <a href="{{route('browse')}}" class="text-2xl font-bold text-white">عيش جوك</a>
            <nav class="hidden md:flex items-center space-x-8 mr-auto">
                <div class="relative">
                    <button id="browse-button" class="text-white hover:text-red-600 flex items-center">
                        <span>تصفح</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div id="browse-menu" class="absolute hidden bg-white text-black shadow-lg rounded mt-2">
                        <a href="#" class="block px-4 py-2 hover:bg-red-600 hover:text-white">القنوات</a>
                        <a href="#" class="block px-4 py-2 hover:bg-red-600 hover:text-white">الأطفال</a>
                        <a href="{{route('films')}}" class="block px-4 py-2 hover:bg-red-600 hover:text-white">الأفلام</a>
                        <a href="" class="block px-4 py-2 hover:bg-red-600 hover:text-white">بودكاست</a>
                        <a href="#" class="block px-4 py-2 hover:bg-red-600 hover:text-white">البرامج</a>
                        <a href="#" class="block px-4 py-2 hover:bg-red-600 hover:text-white">المسلسلات</a>
                        <a href="#" class="block px-4 py-2 hover:bg-red-600 hover:text-white">الأخبار</a>
                        {{-- <a href="#kids-channels" class="block px-4 py-2 hover:bg-red-600 hover:text-white">الأطفال</a>
                        <a href="#movies" class="block px-4 py-2 hover:bg-red-600 hover:text-white">الأفلام</a>
                        <a href="#podcast" class="block px-4 py-2 hover:bg-red-600 hover:text-white">بودكاست</a>
                        <a href="#programs" class="block px-4 py-2 hover:bg-red-600 hover:text-white">البرامج</a>
                        <a href="#series" class="block px-4 py-2 hover:bg-red-600 hover:text-white">المسلسلات</a>
                        <a href="#news" class="block px-4 py-2 hover:bg-red-600 hover:text-white">الأخبار</a> --}}
                    </div>
                </div>
                
                <a href="/account" class="flex items-center text-white hover:text-red-600 space-x-reverse space-x-1">
                    <span class="text-lg">حسابي</span>
                    <i class='bx bxs-user-circle text-3xl'></i>
                </a>
            </nav>
            
            <button id="menu-toggle" class="md:hidden text-white focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </div>
    
        <div id="mobile-menu" class="hidden fixed inset-0 bg-black bg-opacity-80 flex justify-center items-center z-50 text-center ease-in-out duration-300">
            <div class="bg-transparent p-6 w-full max-w-xs">
                <button id="close-menu" class="absolute top-4 left-4 text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
                <a href="#channels" class="px-3 py-3 block text-xl text-white hover:text-red-600">القنوات</a>
                <a href="#kids-channels" class="px-3 py-3 block text-xl text-white hover:text-red-600">الأطفال</a>
                <a href="{{route('films')}}" class="px-3 py-3 block text-xl text-white hover:text-red-600">الأفلام</a>
                <a href="#podcast" class="px-3 py-3 block text-xl text-white hover:text-red-600">بودكاست</a>
                <a href="#programs" class="px-3 py-3 block text-xl text-white hover:text-red-600">البرامج</a>
                <a href="#series" class="px-3 py-3 block text-xl text-white hover:text-red-600">المسلسلات</a>
                <a href="/account" class="px-3 py-3 block text-xl text-white hover:text-red-600">حسابي</a>
            </div>
        </div>
    </header>

    <main class="mt-24 container mx-auto px-4 py-8">
        @yield('content')      
    </main>
    

  <script src="{{ asset('js/script.js') }}"></script>
  <script>
  @stack('scripts')
  </script>
</body>
</html>
