@extends('layouts.app')
@section('title', $channel->name)
@section('content')

<div class="text-center text-[#fca311] py-4 shadow-lg mb-6">
    <h1 class="text-3xl font-bold tracking-wide">{{ $channel->name }}</h1>
</div>

<div class="flex justify-center">
    <div class="relative w-full max-w-4xl overflow-hidden group rounded-lg shadow-lg">
        <video id="filmVideo" controls class="w-full h-auto rounded-lg">
            <source src="{{ $channel->live_url }}" type="video/mp4">
            متصفحك لا يدعم عرض الفيديو.
        </video>
        <div class="bg-gray-900 text-white p-4 mt-4 rounded-lg flex flex-wrap justify-between items-center gap-4 shadow-lg">
            <button id="playPauseButton" class="flex items-center justify-center w-12 h-12 bg-[#fca311] rounded-full shadow hover:bg-[#e88d00] transition">
                <i id="playPauseIcon" class='bx bx-play text-2xl'></i>
            </button>

            <button id="muteButton" class="flex items-center justify-center w-12 h-12 bg-gray-700 rounded-full shadow hover:bg-gray-600 transition">
                <i id="muteIcon" class='bx bx-volume-mute text-2xl'></i>
            </button>

            <button id="fullScreenButton" class="flex items-center justify-center w-12 h-12 bg-gray-700 rounded-full shadow hover:bg-gray-600 transition">
                <i class='bx bx-fullscreen text-2xl'></i>
            </button>

            <a href="{{ route('home') }}" class="flex items-center justify-center w-12 h-12 bg-[#fca311] rounded-full shadow hover:bg-[#e88d00] transition">
                <i class='bx bx-home text-2xl'></i>
            </a>
        </div>
    </div>
</div>

<div class="flex justify-center mt-6 mb-24">

</div>


@push('scripts')
    <script src="{{ asset('js/video.js') }}"></script>
@endpush
@endsection
