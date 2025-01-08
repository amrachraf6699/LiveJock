@extends('layouts.app')
@section('title', 'الأخبار')

@section('content')
    <!-- Important News Slider -->
    <div class="my-8">
        <h2 class="text-3xl font-semibold text-center text-[#dba235] mb-6">الأخبار العاجلة</h2>
        
        <!-- Swiper Slider -->
        <div class="swiper-container">
            <div class="swiper-wrapper">
                @foreach($importantNews as $newsItem)
                    <a href="{{ route('newsWeb.show', $newsItem) }}" class="swiper-slide">
                        <div class="swiper-slide">
                            <div class="relative overflow-hidden group transform transition-transform duration-300 ease-in-out">
                                <img src="{{ $newsItem->cover_url }}" alt="{{ $newsItem->title }}" class="w-full h-[300px] object-cover transition-all duration-300 ease-in-out group-hover:scale-110 group-hover:rotate-2">
                                <div class="absolute inset-0 bg-black bg-opacity-40 flex justify-center items-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                    <h3 class="text-white text-xl font-bold text-center">{{ $newsItem->title }}</h3>
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Regular News List -->
    <div class="my-8">
        <h2 class="text-2xl font-semibold text-center text-[#dba235] mb-4">آخر الأخبار</h2>
        <div class="space-y-6">
            @foreach($news as $newsItem)
                <a href="{{ route('newsWeb.show', $newsItem) }}" class="block">
                    <div class="flex items-center justify-between bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-all">
                        <div class="w-1/3">
                            <img src="{{ $newsItem->cover_url }}" alt="{{ $newsItem->title }}" class="w-80 h-[100px] object-cover rounded-lg">
                        </div>
                        <div class="w-2/3 p-4">
                            <h3 class="text-xl font-semibold text-[#dba235]">{{ $newsItem->title }}</h3>
                            <p class="text-gray-600 text-sm mt-2">{{ Str::limit($newsItem->description, 100) }}</p>
                        </div>
                    </div>
                </a>
            @endforeach        
        </div>
    </div>

    <!-- Pagination for Regular News -->
    <div class="text-center mt-8 mb-20" style="margin-bottom: 100px;">
        {{ $news->links('pagination::custom') }}
    </div>

@endsection

@push('scripts')
    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css">

    <script>
        const swiper = new Swiper('.swiper-container', {
            slidesPerView: 3,  // عرض 3 كروت فقط
            spaceBetween: 10,  // المسافة بين الكروت
            centeredSlides: true,  // الكرت الذي في المنتصف أكبر
            loop: true,
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },
            pagination: false,  // إلغاء النقط
            breakpoints: {
                640: {
                    slidesPerView: 1,  // عرض كرت واحد فقط في الأجهزة الصغيرة
                    spaceBetween: 10,
                },
                1024: {
                    slidesPerView: 3,  // عرض 3 كروت على الشاشات الأكبر
                    spaceBetween: 20,
                },
            },
        });
    </script>
@endpush
