@extends('layouts.app')
@section('title' , $news->title)
@section('content')
    <div class="container mx-auto my-12 px-4">
        <!-- News Header -->
        <div class="flex flex-col md:flex-row items-center mb-8">
            <div class="md:w-1/3">
                <img src="{{ $news->cover_url }}" alt="{{ $news->title }}" class="w-full h-96 object-cover rounded-lg shadow-lg hover:scale-105 transition-transform duration-300 ease-in-out">
            </div>
            <div class="md:w-2/3 md:pl-8 mt-6 md:mt-0 border-l-4 border-[#dba235] pl-4 mr-8">
                <h1 class="text-4xl font-extrabold text-[#dba235] mb-4">{{ $news->title }}</h1>
                <p class="text-gray-500 text-sm mb-6">{{ $news->created_at->format('F j, Y') }}</p>
                <p class="text-lg text-gray-700 leading-relaxed mb-8">{{ $news->description }}</p>

                <!-- Share Buttons -->
                <div class="flex items-center">
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(route('newsWeb.show', $news)) }}" target="_blank" class="text-[#4267B2] hover:text-[#3b5998]">
                        <i class="bx bxl-facebook-circle text-3xl"></i>
                    </a>
                    <a href="https://twitter.com/intent/tweet?url={{ urlencode(route('newsWeb.show', $news)) }}&text={{ urlencode($news->title) }}" target="_blank" class="text-[#1DA1F2] hover:text-[#0d8ecf]">
                        <i class="bx bxl-twitter text-3xl"></i>
                    </a>
                    <a href="https://wa.me/?text={{ urlencode($news->title . ' ' . route('newsWeb.show', $news)) }}" target="_blank" class="text-[#25D366] hover:text-[#128C7E]">
                        <i class="bx bxl-whatsapp text-3xl"></i>
                    </a>
                </div>
            </div>
            </div>
        </div>

        <!-- News Content -->
        <div class="p-8 rounded-lg shadow-lg mt-8 max-w-5xl mx-auto border border-[#dba235]" style="margin-bottom: 100px;">
            <h2 class="text-3xl font-semibold text-[#dba235] mb-4">تفاصيل الخبر</h2>
            <div class="prose max-w-none text-white space-y-4">
                {!! $news->content !!}
            </div>
        </div>
    </div>
@endsection
