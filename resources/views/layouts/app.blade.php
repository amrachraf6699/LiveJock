<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>عيش جوك | @yield('title')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

<!-- Navbar -->
<nav class="z-10 mb-1 mt-8 navbar bg-[#1d212c] border-2 text-white fixed bottom-1 left-1/2 transform -translate-x-1/2 w-max z-10 rounded-full">
    <div class="container p-1 flex justify-center items-center space-x-4">
        <div class="logo flex-shrink-0 cursor-pointer" id="logo" onclick="toggleNavbar()">
            <img src="{{ asset('storage/logo.png') }}" alt="Logo" class="w-12 h-12 mx-auto">
        </div>

        <div id="navbar-items" class="flex items-center gap-4 transition-all duration-500 ease-in-out">
            <!-- Home -->
            <div class="navbar-item relative group">
                <a href="{{ request()->routeIs('home') ? '#' : route('home') }}" class="flex items-center {{ request()->routeIs('home') ? 'active' : '' }}">
                    <i class="bx bx-home text-xl"></i>
                    <span class="navbar-text absolute left-1/2 transform -translate-x-1/2 -top-10 text-xs bg-gray-800 text-white p-1 rounded-lg opacity-0 group-hover:opacity-100 transition-opacity duration-300 shadow-lg">
                        الرئيسية
                    </span>
                </a>
            </div>

            <!-- مشاهدة Dropdown -->
            <div class="navbar-item relative group">
                <a href="#" class="flex items-center" id="dropdownToggle1">
                    <i class="bx bx-play-circle text-xl"></i>
                    <span class="navbar-text absolute left-1/2 transform -translate-x-1/2 -top-10 text-xs bg-gray-800 text-white p-1 rounded-lg opacity-0 group-hover:opacity-100 transition-opacity duration-300 shadow-lg">
                        مشاهدة
                    </span>
                </a>
                <ul id="dropdownMenu1" class="absolute bottom-full left-0 mb-1 bg-gray-800 text-white text-xs rounded-lg shadow-lg w-32 hidden opacity-0 transform scale-y-75 transition-all duration-300 origin-bottom">
                    <li class="px-2 py-1 hover:bg-gray-700 hover:text-[var(--golden-color)]"><a href="{{ route('channels') }}">قنوات عيش جوك</a></li>
                    <li class="px-2 py-1 hover:bg-gray-700 hover:text-[var(--golden-color)]"><a href="{{ route('films') }}">الأفلام</a></li>
                    <li class="px-2 py-1 hover:bg-gray-700 hover:text-[var(--golden-color)]"><a href="{{ route('podcasts') }}">بودكاست</a></li>
                    <li class="px-2 py-1 hover:bg-gray-700 hover:text-[var(--golden-color)]"><a href="{{ route('programs') }}">البرامج</a></li>
                    <li class="px-2 py-1 hover:bg-gray-700 hover:text-[var(--golden-color)]"><a href="{{ route('serieses') }}">المسلسلات</a></li>
                    <li class="px-2 py-1 hover:bg-gray-700 hover:text-[var(--golden-color)]"><a href="{{ route('children') }}">عروض الأطفال</a></li>
                </ul>
            </div>

            <!-- News -->
            <div class="navbar-item relative group">
                <a href="{{ route('news') }}" class="flex items-center">
                    <i class="bx bx-news text-xl"></i>
                    <span class="navbar-text absolute left-1/2 transform -translate-x-1/2 -top-10 text-xs bg-gray-800 text-white p-1 rounded-lg opacity-0 group-hover:opacity-100 transition-opacity duration-300 shadow-lg">
                        الأخبار
                    </span>
                </a>
            </div>

            <!-- الحساب Dropdown -->
            <div class="navbar-item relative group">
                <a href="#" class="flex items-center" id="dropdownToggle2">
                    <i class="bx bx-user text-xl"></i>
                    <span class="navbar-text absolute left-1/2 transform -translate-x-1/2 -top-10 text-xs bg-gray-800 text-white p-1 rounded-lg opacity-0 group-hover:opacity-100 transition-opacity duration-300 shadow-lg">
                        الحساب
                    </span>
                </a>
                <ul id="dropdownMenu2" class="absolute bottom-full left-0 mb-1 bg-gray-800 text-white text-xs rounded-lg shadow-lg w-32 hidden opacity-0 transform scale-y-75 transition-all duration-300 origin-bottom">
                    @auth
                        <li class="px-2 py-1 hover:bg-gray-700 hover:text-[var(--golden-color)]"><a href="#">اللغة</a></li>
                        <li class="px-2 py-1 hover:bg-gray-700 hover:text-[var(--golden-color)]"><a href="#">سجل المشاهدات</a></li>
                        <li class="px-2 py-1 hover:bg-gray-700 hover:text-[var(--golden-color)]"><a href="#">المفضلة</a></li>
                        <li class="px-2 py-1 hover:bg-gray-700 hover:text-[var(--golden-color)]"><a href="#">حسابي</a></li>
                        <li class="px-2 py-1 hover:bg-gray-700 hover:text-[var(--golden-color)]"><a href="#">المساعدة و الدعم</a></li>
                        <li class="px-2 py-1 bg-[var(--golden-color)] hover:text-white"><a href="{{ route('webLogout') }}">تسجيل الخروج</a></li>
                        <li class="px-2 py-1 bg-red-500 hover:text-white"><a href="#">حذف الحساب</a></li>
                    @else
                        <li class="px-2 py-1 hover:bg-gray-700 hover:text-[var(--golden-color)]"><a href="{{ route('login') }}">تسجيل الدخول</a></li>
                        <li class="px-2 py-1 hover:bg-gray-700 hover:text-[var(--golden-color)]"><a href="{{ route('register') }}">تسجيل حساب جديد</a></li>
                    @endauth
                </ul>
            </div>

            <!-- Search -->
            <div class="navbar-item relative group">
                <a href="{{route('search')}}" class="flex items-center">
                    <i class="bx bx-search text-xl"></i>
                    <span class="navbar-text absolute left-1/2 transform -translate-x-1/2 -top-10 text-xs bg-gray-800 text-white p-1 rounded-lg opacity-0 group-hover:opacity-100 transition-opacity duration-300 shadow-lg">
                        البحث
                    </span>
                </a>
            </div>
        </div>
    </div>
</nav>

<!-- Top NavBar -->
<nav class="z-10 mb-6 navbar bg-[#1d212c]  border-2 border-b-0 fixed top-0 left-0 w-full z-10 rounded-b-lg">
    <div class="container p-1 flex justify-between items-center">
        <div class="logo flex-shrink-0 cursor-pointer" id="logo" onclick="toggleTopNavbar()">
            <img src="{{ asset('storage/logo.png') }}" alt="Logo" class="w-16 h-16 mx-auto">
        </div>

        <div class="burger-icon cursor-pointer text-4xl" onclick="toggleTopNavbar()">
            <i class="bx bx-menu"></i>
        </div>
    </div>
</nav>

<div id="overlay" class="fixed inset-0 bg-black bg-opacity-75 hidden z-50 transition-transform duration-500 ease-in-out transform scale-0 opacity-0">
    <div class="flex flex-col justify-center items-center h-full space-y-6 text-white">
        <button class="absolute top-5 left-5 text-4xl" onclick="toggleTopNavbar()">
            <i class="bx bx-x"></i>
        </button>
        <ul class="space-y-6 text-xl text-center">
            <li><a href="{{ route('channels') }}" class="hover:text-[var(--golden-color)]">قنوات عيش جوك</a></li>
            <li><a href="{{ route('films') }}" class="hover:text-[var(--golden-color)]">الأفلام</a></li>
            <li><a href="{{ route('podcasts') }}" class="hover:text-[var(--golden-color)]">بودكاست</a></li>
            <li><a href="{{ route('programs') }}" class="hover:text-[var(--golden-color)]">البرامج</a></li>
            <li><a href="{{ route('serieses') }}" class="hover:text-[var(--golden-color)]">المسلسلات</a></li>
            <li><a href="{{ route('children') }}" class="hover:text-[var(--golden-color)]">عروض الأطفال</a></li>
        </ul>
    </div>
</div>

<!-- Content -->
@yield('content')

<footer id="contact" class="bg-gray-900 text-white py-8 pb-20" dir="rtl">
    <div class="container mx-auto px-4">
        <div class="flex flex-wrap justify-between">
            <!-- القسم الأول -->
            <div class="w-full lg:w-1/2 mb-8 lg:mb-0">
                <div class="mb-4">
                    <a href="#" class="block w-32">
                        <img src="{{ asset('storage/logo.png') }}" alt="شعار الموقع" class="w-full">
                    </a>
                </div>
                <ul class="space-y-2">
                    <li><a href="#" class="text-gray-400 hover:text-yellow-500 text-sm">الشروط والأحكام</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-yellow-500 text-sm">سياسة الخصوصية</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-yellow-500 text-sm">تواصل معنا</a></li>
                </ul>
                <p class="text-sm text-gray-500 mt-4">
                    © {{ date('Y') }} جميع الفيديوهات والمحتوى على هذا الموقع هي علامات تجارية، وجميع الصور والمحتوى المرتبط بها هي ملك لشركة عيش جوك. يحظر إعادة إنتاج هذا المحتوى بأي شكل من الأشكال.
                </p>
            </div>


        @php
            $about = App\Models\About::first();
        @endphp

        <!-- القسم الثاني -->
        <div class="w-full lg:w-1/4 mb-8 lg:mb-0">
            <h6 class="text-lg font-semibold mb-4">تابعنا على:</h6>
            <ul class="flex space-x-4 rtl:space-x-reverse">
                <li>
                    <a href="{{ $about->facebook ?? '#' }}" target="_blank" class="text-gray-400 hover:text-yellow-500">
                        <i class="bx bxl-facebook text-2xl"></i>
                    </a>
                </li>
                <li>
                    <a href="{{ $about->twitter ?? '#' }}" target="_blank" class="text-gray-400 hover:text-yellow-500">
                        <i class="bx bxl-twitter text-2xl"></i>
                    </a>
                </li>
                <li>
                    <a href="{{ $about->youtube ?? '#' }}" target="_blank" class="text-gray-400 hover:text-yellow-500">
                        <i class="bx bxl-youtube text-2xl"></i>
                    </a>
                </li>
                <li>
                    <a href="{{ $about->snapchat ?? '#' }}" target="_blank" class="text-gray-400 hover:text-yellow-500">
                        <i class="bx bxl-snapchat text-2xl"></i>
                    </a>
                </li>
                <li>
                    <a href="{{ $about->instagram ?? '#' }}" target="_blank" class="text-gray-400 hover:text-yellow-500">
                        <i class="bx bxl-instagram text-2xl"></i>
                    </a>
                </li>
                <li>
                    <a href="{{ $about->website ?? '#' }}" class="text-gray-400 hover:text-yellow-500">
                        <i class="bx bx-globe text-2xl"></i>
                    </a>
                </li>
            </ul>
        </div>


            <!-- القسم الثالث -->
            <div class="w-full lg:w-1/4">
                <h6 class="text-lg font-semibold mb-4">حمّل التطبيق من:</h6>
                <div class="flex space-x-4 rtl:space-x-reverse">
                    <a href="https://play.google.com/store/apps/details?id=net.rotana" target="_blank" class="block w-32">
                        <img src="https://d1rjxhevrfxjk0.cloudfront.net/images/new-img/01.jpg" alt="متجر بلاي" class="w-full">
                    </a>
                    <a href="https://apps.apple.com/eg/app/rotana-net/id1238137062" target="_blank" class="block w-32">
                        <img src="https://d1rjxhevrfxjk0.cloudfront.net/images/new-img/02.jpg" alt="متجر أبل" class="w-full">
                    </a>
                </div>
            </div>
        </div>
    </div>
</footer>

<script src="{{ asset('js/script.js') }}"></script>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
@stack('scripts')
</body>
</html>
