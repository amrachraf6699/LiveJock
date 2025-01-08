@extends('layouts.app')
@section('title', $episode->title)
@section('content')

<div class="text-center text-[#fca311] py-4 shadow-lg mb-6">
    <h1 class="text-3xl font-bold tracking-wide">{{ $episode->title }}</h1>
</div>

<div class="flex justify-center">
    <div class="relative w-full max-w-4xl overflow-hidden group rounded-lg shadow-lg">
        <video id="filmVideo" controls class="w-full h-auto rounded-lg">
            <source src="{{ asset('storage/' . $episode->video_url) }}" type="video/mp4">
            متصفحك لا يدعم عرض الفيديو.
        </video>
        <div class="bg-gray-900 text-white p-4 mt-4 rounded-lg flex flex-wrap justify-between items-center gap-4 shadow-lg">
            <button id="playPauseButton" class="flex items-center justify-center w-12 h-12 bg-[#fca311] rounded-full shadow hover:bg-[#e88d00] transition">
                <i id="playPauseIcon" class='bx bx-play text-2xl'></i>
            </button>

            <button id="rewindButton" class="flex items-center justify-center w-12 h-12 bg-gray-700 rounded-full shadow hover:bg-gray-600 transition">
                <i class='bx bx-rewind text-2xl'></i>
            </button>

            <button id="forwardButton" class="flex items-center justify-center w-12 h-12 bg-gray-700 rounded-full shadow hover:bg-gray-600 transition">
                <i class='bx bx-fast-forward text-2xl'></i>
            </button>

            <button id="muteButton" class="flex items-center justify-center w-12 h-12 bg-gray-700 rounded-full shadow hover:bg-gray-600 transition">
                <i id="muteIcon" class='bx bx-volume-mute text-2xl'></i>
            </button>

            <div class="flex items-center justify-between w-full md:w-auto gap-4">
                <button id="fullScreenButton" class="flex items-center justify-center w-12 h-12 bg-gray-700 rounded-full shadow hover:bg-gray-600 transition">
                    <i class='bx bx-fullscreen text-2xl'></i>
                </button>

                <label class="flex items-center">
                    <span class="mr-2">السرعة:</span>
                    <select id="speedControl" class="bg-gray-800 text-white px-4 py-2 rounded-lg shadow focus:ring-2 focus:ring-[#fca311]">
                        <option value="0.5">0.5x</option>
                        <option value="1" selected>1x</option>
                        <option value="1.5">1.5x</option>
                        <option value="2">2x</option>
                    </select>
                </label>

                <a href="{{ route('home') }}" class="flex items-center justify-center w-12 h-12 bg-[#fca311] rounded-full shadow hover:bg-[#e88d00] transition">
                    <i class='bx bx-home text-2xl'></i>
                </a>
            </div>
        </div>
    </div>
</div>

<!-- عرض الحلقات الأخرى -->
<div class="p-8 mb-12">
    <h2 class="text-xl font-semibold text-white">الحلقات الأخرى</h2>
    <div class="flex mt-4 gap-4">
        @foreach($episodes as $otherEpisode)
            @if($otherEpisode->id == $episode->id)
                <div class="w-40 h-48 text-white rounded-lg relative overflow-hidden group flex-shrink-0 shadow-lg bg-[#fca311] cursor-not-allowed opacity-80">
                    <img src="{{ asset('storage/' . $otherEpisode->cover) }}" alt="{{ $otherEpisode->title }}" class="w-full h-full object-cover">
                    <div class="absolute inset-0 flex items-center justify-center bg-[#dba235] bg-opacity-20">
                        <div class="text-center">
                            <h3 class="text-sm font-bold text-black">
                                {{ $otherEpisode->title }}
                            </h3>
                            <i class='bx bx-volume-full text-xl mt-2'></i> <!-- أيقونة الصوت -->
                        </div>
                    </div>
                </div>
            @else
                <a href="{{ route('podcasts.episode', [$podcast, $otherEpisode]) }}" class="w-40 h-48 text-white rounded-lg relative overflow-hidden group flex-shrink-0 transition-all duration-300 ease-in-out shadow-lg hover:shadow-xl transform group-hover:scale-105 group-hover:rotate-2 group-hover:translate-y-2">
                    <img src="{{ asset('storage/' . $otherEpisode->cover) }}" alt="{{ $otherEpisode->title }}" class="w-full h-full object-cover transition-all duration-300 ease-in-out group-hover:opacity-80">
                    <div class="absolute inset-0 flex items-center justify-center bg-[#dba235] bg-opacity-10 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        <div class="text-center">
                            <h3 class="text-sm font-bold transform group-hover:scale-110 transition-all duration-300">
                                {{ $otherEpisode->title }}
                            </h3>
                            <i class='bx bx-play-circle mt-2'></i>
                        </div>
                    </div>
                </a>
            @endif
        @endforeach
    </div>
</div>


@endsection

@push('scripts')
    <script src="{{ asset('js/video.js') }}"></script>
@endpush
