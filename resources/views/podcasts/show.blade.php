@extends('layouts.app')

@section('title', $podcast->name)

@section('content')
<div class="relative w-full h-48 bg-cover bg-center" style="background-image: url('{{ $podcast->cover_url }}')">
    <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center text-white p-4">
        <h1 class="text-3xl font-bold">{{ $podcast->name }}</h1>
    </div>
</div>

<div class="p-8 mb-12">
    <div class="flex justify-between items-center">
        <h2 class="text-xl font-semibold text-white">الحلقات</h2>
    </div>
    <div class="flex mt-4 gap-4 custom-scrollbar">
        @forelse($podcast->episodes as $episode)
            <a href="{{ route('podcasts.episode', ['podcast' => $podcast , 'episode' => $episode]) }}" class="w-40 h-48 text-white rounded-lg relative overflow-hidden group flex-shrink-0 transition-all duration-300 ease-in-out shadow-lg hover:shadow-xl transform group-hover:scale-105 group-hover:rotate-2 group-hover:translate-y-2">
                <img src="{{ asset('storage/' . $episode->cover) }}" alt="{{ $episode->title }}" class="w-full h-full object-cover transition-all duration-300 ease-in-out group-hover:opacity-80">
                <div class="absolute inset-0 flex items-center justify-center bg-[#dba235] bg-opacity-10 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    <div class="text-center">
                        <h3 class="text-sm font-bold transform group-hover:scale-110 transition-all duration-300">
                            {{ $episode->title }}
                        </h3>
                        <i class='bx bx-play-circle mt-2'></i>
                    </div>
                </div>
        @empty
            <p class="text-white">لا توجد حلقات حالياً</p>
        @endforelse
    </div>
</div>
@endsection
