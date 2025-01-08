@extends('layouts.app')
@section('title', $film->name)
@section('content')

<!-- اسم الفيلم -->
<div class="text-center text-[#fca311] py-4 shadow-lg mb-6">
    <h1 class="text-3xl font-bold tracking-wide">{{ $film->name }}</h1>
</div>

<!-- عرض الفيديو -->
<div class="flex justify-center">
    <div class="relative w-full max-w-4xl overflow-hidden group rounded-lg shadow-lg">
        <video id="filmVideo" controls class="w-full h-auto rounded-lg">
            <source src="{{ asset('storage/' . $film->file->video_url) }}" type="video/mp4">
            متصفحك لا يدعم عرض الفيديو.
        </video>
        <div class="bg-gray-900 text-white p-4 mt-4 rounded-lg flex flex-wrap justify-between items-center gap-4 shadow-lg">
            <!-- زر التشغيل/الإيقاف -->
            <button id="playPauseButton" class="flex items-center justify-center w-12 h-12 bg-[#fca311] rounded-full shadow hover:bg-[#e88d00] transition">
                <i id="playPauseIcon" class='bx bx-play text-2xl'></i>
            </button>

            <!-- زر التأخير كدائرة -->
            <button id="rewindButton" class="flex items-center justify-center w-12 h-12 bg-gray-700 rounded-full shadow hover:bg-gray-600 transition">
                <i class='bx bx-rewind text-2xl'></i>
            </button>

            <!-- زر التقديم كدائرة -->
            <button id="forwardButton" class="flex items-center justify-center w-12 h-12 bg-gray-700 rounded-full shadow hover:bg-gray-600 transition">
                <i class='bx bx-fast-forward text-2xl'></i>
            </button>

            <!-- التحكم في الصوت -->
            <button id="muteButton" class="flex items-center justify-center w-12 h-12 bg-gray-700 rounded-full shadow hover:bg-gray-600 transition">
                <i id="muteIcon" class='bx bx-volume-mute text-2xl'></i>
            </button>

            <!-- قسم الأزرار في سطر واحد -->
            <div class="flex items-center justify-between w-full md:w-auto gap-4">
                <!-- زر ملء الشاشة -->
                <button id="fullScreenButton" class="flex items-center justify-center w-12 h-12 bg-gray-700 rounded-full shadow hover:bg-gray-600 transition">
                    <i class='bx bx-fullscreen text-2xl'></i>
                </button>

                <!-- التحكم في السرعة -->
                <label class="flex items-center">
                    <span class="mr-2">السرعة:</span>
                    <select id="speedControl" class="bg-gray-800 text-white px-4 py-2 rounded-lg shadow focus:ring-2 focus:ring-[#fca311]">
                        <option value="0.5">0.5x</option>
                        <option value="1" selected>1x</option>
                        <option value="1.5">1.5x</option>
                        <option value="2">2x</option>
                    </select>
                </label>

                <!-- زر العودة للصفحة الرئيسية -->
                <a href="{{ route('home') }}" class="flex items-center justify-center w-12 h-12 bg-[#fca311] rounded-full shadow hover:bg-[#e88d00] transition">
                    <i class='bx bx-home text-2xl'></i>
                </a>
            </div>
        </div>
    </div>
</div>

<!-- زر العودة -->
<div class="flex justify-center mt-6 mb-24">

</div>


@push('scripts')
    <script src="{{ asset('js/video.js') }}"></script>
@endpush
@endsection
