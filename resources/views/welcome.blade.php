<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>عيش جوك | الصفحة الرئيسية</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}"> <!-- الرابط لملف التنسيق -->
</head>
<body>

<!-- Navbar -->
<nav class="z-50 mb-1 navbar bg-[#1d212c] border-2 text-white fixed bottom-1 left-1/2 transform -translate-x-1/2 w-max z-10 rounded-full">
    <div class="container p-1 flex justify-center items-center space-x-6">
        <div class="logo flex-shrink-0 cursor-pointer" id="logo" onclick="toggleNavbar()">
            <img src="{{ asset('storage/logo.png') }}" alt="Logo" class="w-16 h-16 mx-auto">
        </div>

        <!-- باقي العناصر -->
        <div id="navbar-items" class="flex items-center gap-8 opacity-0 transform translate-y-4 transition-all duration-500 ease-in-out" style="display: none;">
            <div class="navbar-item relative group">
                <a href="#" class="flex items-center {{ request()->routeIs('home') ? 'active' : '' }}">
                    <i class="bx bx-home text-2xl"></i>
                    <span class="navbar-text absolute left-1/2 transform -translate-x-1/2 -top-12 text-sm bg-gray-800 text-white p-2 rounded-lg opacity-0 group-hover:opacity-100 transition-opacity duration-300 shadow-lg">
                        الرئيسية
                    </span>
                </a>
            </div>

            <div class="navbar-item relative group">
                <a href="#" class="flex items-center" id="dropdownToggle">
                    <i class="bx bx-play-circle text-2xl"></i>
                    <span class="navbar-text absolute left-1/2 transform -translate-x-1/2 -top-12 text-sm bg-gray-800 text-white p-2 rounded-lg opacity-0 group-hover:opacity-100 transition-opacity duration-300 shadow-lg">
                        مشاهدة
                    </span>
                </a>
                <ul id="dropdownMenu" class="absolute bottom-full left-0 mb-2 bg-gray-800 text-white text-sm rounded-lg shadow-lg w-40 hidden opacity-0 transform scale-y-75 transition-all duration-300 origin-bottom">
                    <li class="px-4 py-2 hover:bg-gray-700 hover:text-[var(--golden-color)]"><a href="#">قنوات عيش جوك</a></li>
                    <li class="px-4 py-2 hover:bg-gray-700 hover:text-[var(--golden-color)]"><a href="#">الأفلام</a></li>
                    <li class="px-4 py-2 hover:bg-gray-700 hover:text-[var(--golden-color)]"><a href="#">بودكاست</a></li>
                    <li class="px-4 py-2 hover:bg-gray-700 hover:text-[var(--golden-color)]"><a href="#">البرامج</a></li>
                    <li class="px-4 py-2 hover:bg-gray-700 hover:text-[var(--golden-color)]"><a href="#">المسلسلات</a></li>
                    <li class="px-4 py-2 hover:bg-gray-700 hover:text-[var(--golden-color)]"><a href="#">عروض الأطفال</a></li>
                </ul>
            </div>

            <div class="navbar-item relative group">
                <a href="#" class="flex items-center">
                    <i class="bx bx-news text-2xl"></i>
                    <span class="navbar-text absolute left-1/2 transform -translate-x-1/2 -top-12 text-sm bg-gray-800 text-white p-2 rounded-lg opacity-0 group-hover:opacity-100 transition-opacity duration-300 shadow-lg">
                        الأخبار
                    </span>
                </a>
            </div>

            <div class="navbar-item relative group">
                <a href="#" class="flex items-center">
                    <i class="bx bx-user text-2xl"></i>
                    <span class="navbar-text absolute left-1/2 transform -translate-x-1/2 -top-12 text-sm bg-gray-800 text-white p-2 rounded-lg opacity-0 group-hover:opacity-100 transition-opacity duration-300 shadow-lg">
                        الحساب
                    </span>
                </a>
            </div>

            <div class="navbar-item relative group">
                <a href="#" class="flex items-center">
                    <i class="bx bx-search text-2xl"></i>
                    <span class="navbar-text absolute left-1/2 transform -translate-x-1/2 -top-12 text-sm bg-gray-800 text-white p-2 rounded-lg opacity-0 group-hover:opacity-100 transition-opacity duration-300 shadow-lg">
                        البحث
                    </span>
                </a>
            </div>
        </div>

    </div>
</nav>

<!-- قسم الصورة الرئيسية -->
<div class="relative w-full h-[550px] overflow-hidden group rounded-b-lg mb-2">
    <img src="https://images.pexels.com/photos/29893437/pexels-photo-29893437/free-photo-of-charming-historical-streets-of-brno-czechia.jpeg?auto=compress&cs=tinysrgb&w=600&lazy=load" alt="صورة الفيلم الرئيسية" class="w-full h-full object-cover transform group-hover:scale-110 group-hover:blur-sm transition-all duration-500 ease-in-out rounded-b-lg">

    <!-- الخلفية مع التدرج -->
    <div class="absolute inset-0 bg-gradient-to-t from-[#2c2d31] to-transparent z-10 transition-all duration-500 ease-in-out rounded-b-lg"></div>
    <div class="absolute inset-0 pointer-events-none" id="mouse-area"></div>

    <div class="absolute inset-0 flex flex-col items-center justify-center text-center text-white z-20">
        <h1 class="text-5xl font-bold leading-tight transform group-hover:scale-110 group-hover:rotate-2 transition-all duration-500 ease-in-out text-shadow-md">
            عنوان الفيلم
        </h1>
        <p class="mt-4 text-lg max-w-md transform group-hover:scale-110 group-hover:rotate-1 transition-all duration-500 ease-in-out text-shadow-md">
            بعض الوصف عن الفيلم...
        </p>
        <a href="#cta-link" class="mt-6 inline-block px-8 py-3 text-lg font-semibold text-white bg-[#dba235] rounded-lg hover:bg-[#b37a0d] transform group-hover:scale-110 group-hover:rotate-3 transition-all duration-300 ease-in-out shadow-lg hover:shadow-2xl">
            شاهد الآن
        </a>
    </div>
</div>
<!-- قسم القنوات -->
<div class="p-8 mb-12">
    <div class="flex justify-between items-center">
        <h2 class="text-xl font-semibold text-white">القنوات</h2>
        <a href="#" class="text-[#dba235] hover:underline text-sm">الكل</a>
    </div>
    <div class="p-8 flex mt-4 gap-4 custom-scrollbar" id="movie-scroll">
        @forelse($channels as $channel)
        <a href="#">
            <div class="movie-card w-40 h-48 text-white rounded-lg relative overflow-hidden group flex-shrink-0 transition-all duration-300 ease-in-out shadow-lg hover:shadow-xl transform group-hover:scale-105 group-hover:rotate-2 group-hover:translate-y-2">
                <img src="{{ $channel->cover_url }}" alt="{{ $channel->name }}" class="w-full h-full object-cover transition-all duration-300 ease-in-out group-hover:opacity-80">
                <div class="absolute inset-0 flex items-center justify-center bg-[#dba235] bg-opacity-10 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    <div class="text-center">
                        <h3 class="text-sm font-bold transform group-hover:scale-110 transition-all duration-300">
                            {{ $channel->name }}
                        </h3>
                        <i class='bx bx-play-circle mt-2'></i>
                    </div>
                </div>
            </div>
        </a>
        @empty
            <p class="text-white">لا توجد قنوات حالياً</p>
        @endforelse
    </div>
</div>

<!-- قسم البرامج -->
<div class="p-8 mb-12">
    <div class="flex justify-between items-center">
        <h2 class="text-xl font-semibold text-white">البرامج</h2>
        <a href="#" class="text-[#dba235] hover:underline text-sm">الكل</a>
    </div>
    <div class="p-8 flex mt-4 gap-4 custom-scrollbar" id="movie-scroll">
        @forelse($programs as $program)
        <a href="#">
            <div class="movie-card w-40 h-48 text-white rounded-lg relative overflow-hidden group flex-shrink-0 transition-all duration-300 ease-in-out shadow-lg hover:shadow-xl transform group-hover:scale-105 group-hover:rotate-2 group-hover:translate-y-2">
                <img src="{{ $program->cover_url }}" alt="{{ $program->name }}" class="w-full h-full object-cover transition-all duration-300 ease-in-out group-hover:opacity-80">
                <div class="absolute inset-0 flex items-center justify-center bg-[#dba235] bg-opacity-10 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    <div class="text-center">
                        <h3 class="text-sm font-bold transform group-hover:scale-110 transition-all duration-300">
                            {{ $program->name }}
                        </h3>
                        <i class='bx bx-play-circle mt-2'></i>
                    </div>
                </div>
            </div>
        </a>
        @empty
            <p class="text-white">لا توجد برامج حالياً</p>
        @endforelse
    </div>
</div>

<!-- قسم الأفلام -->
<div class="p-8 mb-12">
    <div class="flex justify-between items-center">
        <h2 class="text-xl font-semibold text-white">الأفلام</h2>
        <a href="#" class="text-[#dba235] hover:underline text-sm">الكل</a>
    </div>
    <div class="p-8 flex mt-4 gap-4 custom-scrollbar" id="movie-scroll">
        @forelse($films as $film)
        <a href="#">
            <div class="movie-card w-40 h-48 text-white rounded-lg relative overflow-hidden group flex-shrink-0 transition-all duration-300 ease-in-out shadow-lg hover:shadow-xl transform group-hover:scale-105 group-hover:rotate-2 group-hover:translate-y-2">
                <img src="{{ $film->cover_url }}" alt="{{ $film->name }}" class="w-full h-full object-cover transition-all duration-300 ease-in-out group-hover:opacity-80">
                <div class="absolute inset-0 flex items-center justify-center bg-[#dba235] bg-opacity-10 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    <div class="text-center">
                        <h3 class="text-sm font-bold transform group-hover:scale-110 transition-all duration-300">
                            {{ $film->name }}
                        </h3>
                        <i class='bx bx-play-circle mt-2'></i>
                    </div>
                </div>
            </div>
        </a>
        @empty
            <p class="text-white">لا توجد أفلام حالياً</p>
        @endforelse
    </div>
</div>

<!-- قسم عروض الأطفال -->
<div class="p-8 mb-12">
    <div class="flex justify-between items-center">
        <h2 class="text-xl font-semibold text-white">عروض الأطفال</h2>
        <a href="#" class="text-[#dba235] hover:underline text-sm">الكل</a>
    </div>
    <div class="p-8 flex mt-4 gap-4 custom-scrollbar" id="movie-scroll">
        @forelse($children as $child)
        <a href="#">
            <div class="movie-card w-40 h-48 text-white rounded-lg relative overflow-hidden group flex-shrink-0 transition-all duration-300 ease-in-out shadow-lg hover:shadow-xl transform group-hover:scale-105 group-hover:rotate-2 group-hover:translate-y-2">
                <img src="{{ $child->cover_url }}" alt="{{ $child->name }}" class="w-full h-full object-cover transition-all duration-300 ease-in-out group-hover:opacity-80">
                <div class="absolute inset-0 flex items-center justify-center bg-[#dba235] bg-opacity-10 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    <div class="text-center">
                        <h3 class="text-sm font-bold transform group-hover:scale-110 transition-all duration-300">
                            {{ $child->name }}
                        </h3>
                        <i class='bx bx-play-circle mt-2'></i>
                    </div>
                </div>
            </div>
        </a>
        @empty
            <p class="text-white">لا توجد عروض أطفال حالياً</p>
        @endforelse
    </div>
</div>

<!-- JavaScript File -->
<script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
