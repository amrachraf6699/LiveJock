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

<!-- Top NavBar -->
<nav class="z-10 mb-6 navbar bg-[#1d212c] border-b-0 fixed top-0 left-0 w-full z-10 rounded-b-3xl">
    <div class="container p-1 flex justify-between items-center">
        <div class="logo flex-shrink-0 cursor-pointer" id="logo" onclick="toggleTopNavbar()">
            <img src="{{ asset('storage/logo.png') }}" alt="Logo" class="w-16 h-16 mx-auto">
        </div>

        <div class="burger-icon cursor-pointer text-4xl" onclick="toggleTopNavbar()">
            <i class="bx bx-menu"></i>
        </div>
    </div>
</nav>

<div  id="overlay-navbar-items" class="fixed inset-0 bg-black bg-opacity-90 hidden z-50 transition-all duration-500 ease-in-out transform scale-0 opacity-0">
    <div class="flex flex-col justify-center items-center h-full space-y-6 text-white">
        <button class="absolute top-5 left-5 text-4xl" onclick="toggleTopNavbar()">
            <i class="bx bx-x"></i>
        </button>
        <ul class="space-y-6 text-xl text-center">
            <li><a href="{{ route('home') }}" class="hover:text-[var(--golden-color)]">الصفحة الرئيسية</a></li>
            <li><a href="{{ route('news') }}" class="hover:text-[var(--golden-color)]">الاخبار</a></li>
            <li><a href="" class="hover:text-[var(--golden-color)]">حسابي</a></li>
            <li><a href="{{ route('search') }}" class="hover:text-[var(--golden-color)]">البحث</a></li>
            <li class="relative group cursor-pointer">
                <span class="block hover:text-[var(--golden-color)]">مشاهدة</span>
                <ul class="p-1 space-y-2 mt-2 absolute hidden group-hover:block right-full top-[-160px] bg-[#1d212c] rounded-lg shadow-lg w-56 text-sm sm:w-40 sm:text-xs">
                    <li><a href="{{ route('channels') }}" class="block px-4 py-2 hover:text-[var(--golden-color)]">قنوات عيش جوك</a></li>
                    <hr class="border-t border-gray-700">
                    <li><a href="{{ route('films') }}" class="block px-4 py-2 hover:text-[var(--golden-color)]">الأفلام</a></li>
                    <hr class="border-t border-gray-700">
                    <li><a href="{{ route('podcasts') }}" class="block px-4 py-2 hover:text-[var(--golden-color)]">بودكاست</a></li>
                    <hr class="border-t border-gray-700">
                    <li><a href="{{ route('programs') }}" class="block px-4 py-2 hover:text-[var(--golden-color)]">البرامج</a></li>
                    <hr class="border-t border-gray-700">
                    <li><a href="{{ route('serieses') }}" class="block px-4 py-2 hover:text-[var(--golden-color)]">المسلسلات</a></li>
                    <hr class="border-t border-gray-700">
                    <li><a href="{{ route('children') }}" class="block px-4 py-2 hover:text-[var(--golden-color)]">عروض الأطفال</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>


<!--Start  Content -->
@yield('content')
<!--End  Content -->

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
                    <a href="#" target="_blank" class="block w-32">
                        <img src="{{ asset('apps.png') }}" alt="متجر بلاي" class="w-full">
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
