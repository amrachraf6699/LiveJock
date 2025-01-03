@extends('browse.layout')
@section('title' , 'الصفحة الرئيسية')
@section('content')
<section class="flex justify-center gap-4 mb-6 flex-wrap">
    <button class="section-btn px-6 py-2 rounded-full bg-red-600 text-white hover:bg-red-700 transition" data-section="channels">القنوات</button>
    <button class="section-btn px-6 py-2 rounded-full bg-red-600 text-white hover:bg-red-700 transition" data-section="kids-channels">الأطفال</button>
    <button class="section-btn px-6 py-2 rounded-full bg-red-600 text-white hover:bg-red-700 transition" data-section="movies">الأفلام</button>
    <button class="section-btn px-6 py-2 rounded-full bg-red-600 text-white hover:bg-red-700 transition" data-section="podcasts">بودكاست</button>
    <button class="section-btn px-6 py-2 rounded-full bg-red-600 text-white hover:bg-red-700 transition" data-section="programs">البرامج</button>
    <button class="section-btn px-6 py-2 rounded-full bg-red-600 text-white hover:bg-red-700 transition" data-section="series">المسلسلات</button>
</section>

<div id="section-content" class="hidden bg-red-600 p-6 rounded-lg shadow relative text-white">
    <div id="content-container" class="hidden"></div>
</div>   
<div id="loading-spinner" class="hidden fixed inset-0 flex justify-center items-center bg-black bg-opacity-75 z-50">
    <div class="flex flex-col items-center">
        <img src="{{ asset('storage/loading.gif') }}" alt="Loading" class="w-12 h-12 mb-2">
        <p class="text-white font-bold">جاري التحميل...</p>
    </div>
</div>       
@endsection