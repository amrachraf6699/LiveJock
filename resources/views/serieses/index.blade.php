@extends('layouts.app')

@section('title', 'قائمة المسلسلات')

@section('content')
<div class="container mx-auto px-4 py-8">

    <!-- عنوان الصفحة -->
    <div class="mb-6">
        <h1 class="text-center text-3xl font-semibold text-[var(--golden-color)] underline">قائمة المسلسلات</h1>
    </div>

    <!-- عرض القنوات -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @forelse($serieses as $series)
            <a href="{{ route('serieses.show', $series) }}" class="w-full">
                <div class="movie-card w-full h-64 w-64 text-white rounded-lg relative overflow-hidden group flex-shrink-0 transition-all duration-300 ease-in-out shadow-lg hover:shadow-xl transform group-hover:scale-105 group-hover:rotate-2 group-hover:translate-y-2">
                    <img src="{{  $series->cover_url }}" alt="{{ $series->name }}" class="w-full h-full object-cover transition-all duration-300 ease-in-out group-hover:opacity-80">
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
            <p class="text-white">لا توجد برامج حالياً</p>
        @endforelse
    </div>

    <!-- التصفح -->
    <div class="mt-12">
        {{ $serieses->links('pagination::custom') }}
    </div>

</div>
@endsection
