@extends('layouts.app')
@section('title', 'الصفحة الرئيسية')
@section('content')

<!-- الحاوية الرئيسية -->
<div class="relative w-full mt-12">
    <!-- السلايدر -->
    <div class="swiper-container relative w-full h-[550px] overflow-hidden rounded-b-lg mb-2">
        <!-- Wrapper -->
        <div class="swiper-wrapper">
            @foreach ($slider_items as $item)
                <div class="swiper-slide relative w-full h-full">
                    <!-- صورة العنصر -->
                    <img src="{{ $item->cover_url ?? 'https://via.placeholder.com/600x550' }}"
                         alt="{{ $item->title }}"
                         class="w-full h-full object-cover transform group-hover:scale-110 group-hover:blur-sm transition-all duration-500 ease-in-out rounded-b-lg">

                    <!-- الخلفية مع التدرج -->
                    <div class="absolute inset-0 bg-gradient-to-t from-[#2c2d31] to-transparent z-10 rounded-b-lg"></div>

                    <!-- محتوى النص -->
                    <div class="absolute inset-0 flex flex-col items-center justify-center text-center text-white z-20">
                        <h1 class="text-5xl font-bold leading-tight transform group-hover:scale-110 transition-all duration-500 ease-in-out text-shadow-md">
                            {{ $item->name ?? 'بدون عنوان' }}
                        </h1>
                        <a href="{{ route($item->route_name, $item->slug) }}"
                           class="mt-6 inline-block px-8 py-3 text-lg font-semibold text-white bg-[#dba235] rounded-lg hover:bg-[#b37a0d] transform group-hover:scale-110 transition-all duration-300 ease-in-out shadow-lg hover:shadow-2xl">
                            شاهد الآن
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="swiper-pagination"></div>

        <!-- Navigation buttons -->
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>
</div>

<!-- قسم القنوات -->
<div class="p-8">
    <div class="flex justify-between items-center">
        <h2 class="text-xl font-semibold text-white">القنوات</h2>
        <a href="{{ route('channels') }}" class="text-[#dba235] hover:underline text-sm">الكل</a>
    </div>
    <div class="flex mt-4 gap-4 custom-scrollbar" id="movie-scroll">
        @forelse($channels as $channel)
        <a href="{{ route('channels.show' , $channel) }}">
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
<div class="p-8">
    <div class="flex justify-between items-center">
        <h2 class="text-xl font-semibold text-white">البرامج</h2>
        <a href="{{ route('programs') }}" class="text-[#dba235] hover:underline text-sm">الكل</a>
    </div>
    <div class="flex mt-4 gap-4 custom-scrollbar" id="movie-scroll">
        @forelse($programs as $program)
        <a href="{{ route('programs.show' , $program) }}">
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
<div class="p-8">
    <div class="flex justify-between items-center">
        <h2 class="text-xl font-semibold text-white">الأفلام</h2>
        <a href="{{ route('films') }}" class="text-[#dba235] hover:underline text-sm">الكل</a>
    </div>
    <div class="flex mt-4 gap-4 custom-scrollbar" id="movie-scroll">
        @forelse($films as $film)
        <a href="{{ route('films.show' , $film) }}">
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
<div class="p-8">
    <div class="flex justify-between items-center">
        <h2 class="text-xl font-semibold text-white">عروض الأطفال</h2>
        <a href="{{ route('children') }}" class="text-[#dba235] hover:underline text-sm">الكل</a>
    </div>
    <div class="flex mt-4 gap-4 custom-scrollbar" id="movie-scroll">
        @forelse($children as $child)
        <a href="{{ route('children.show' , $child) }}">
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

<!-- قسم البودكاست -->
<div class="p-8">
    <div class="flex justify-between items-center">
        <h2 class="text-xl font-semibold text-white">بودكاست</h2>
        <a href="{{ route('podcasts') }}" class="text-[#dba235] hover:underline text-sm">الكل</a>
    </div>
    <div class="flex mt-4 gap-4 custom-scrollbar" id="movie-scroll">
        @forelse($podcasts as $podcast)
        <a href="{{ route('podcasts.show' , $podcast) }}">
            <div class="movie-card w-40 h-48 text-white rounded-lg relative overflow-hidden group flex-shrink-0 transition-all duration-300 ease-in-out shadow-lg hover:shadow-xl transform group-hover:scale-105 group-hover:rotate-2 group-hover:translate-y-2">
                <img src="{{ $podcast->cover_url }}" alt="{{ $podcast->name }}" class="w-full h-full object-cover transition-all duration-300 ease-in-out group-hover:opacity-80">
                <div class="absolute inset-0 flex items-center justify-center bg-[#dba235] bg-opacity-10 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    <div class="text-center">
                        <h3 class="text-sm font-bold transform group-hover:scale-110 transition-all duration-300">
                            {{ $podcast->name }}
                        </h3>
                        <i class='bx bx-play-circle mt-2'></i>
                    </div>
                </div>
            </div>
        </a>
        @empty
            <p class="text-white">لا يوجد بوكدكاست حالياً</p>
        @endforelse
    </div>
</div>

<!-- قسم المسلسلات -->
<div class="p-8 mb-12">
    <div class="flex justify-between items-center">
        <h2 class="text-xl font-semibold text-white">المسلسلات</h2>
        <a href="{{ route('serieses') }}" class="text-[#dba235] hover:underline text-sm">الكل</a>
    </div>
    <div class="flex mt-4 gap-4 custom-scrollbar" id="movie-scroll">
        @forelse($serieses as $series)
        <a href="{{ route('serieses.show' , $series) }}">
            <div class="movie-card w-40 h-48 text-white rounded-lg relative overflow-hidden group flex-shrink-0 transition-all duration-300 ease-in-out shadow-lg hover:shadow-xl transform group-hover:scale-105 group-hover:rotate-2 group-hover:translate-y-2">
                <img src="{{ $series->cover_url }}" alt="{{ $series->name }}" class="w-full h-full object-cover transition-all duration-300 ease-in-out group-hover:opacity-80">
                <div class="absolute inset-0 flex items-center justify-center bg-[#dba235] bg-opacity-10 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    <div class="text-center">
                        <h3 class="text-sm font-bold transform group-hover:scale-110 transition-all duration-300">
                            {{ $series->name }}
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

@endsection
@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    new Swiper('.swiper-container', {
        loop: true,
        autoplay: {
            delay: 3000,
            disableOnInteraction: false,
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        slidesPerView: 1,
        effect: 'slide',
        speed: 800,
    });
});

</script>
@endpush
