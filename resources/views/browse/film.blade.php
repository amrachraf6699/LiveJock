@extends('browse.layout')

@section('title', $film->name)

@section('content')
    <!-- Background Section and Film Details -->
    <div class="relative bg-gray-900 rounded-lg">
        <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('{{ $film->cover_url }}'); object-fit: cover;">
            <div class="bg-black bg-opacity-75 w-full h-full absolute inset-0"></div>
        </div>

        <div class="relative z-10 max-w-screen-xl mx-auto px-6 sm:px-12 py-12 text-white">
            <div class="text-center mb-8">
                <h1 class="text-4xl font-extrabold">{{ $film->name }}</h1>
                <p class="text-lg text-gray-300 mt-2">تاريخ الإضافة: {{ \Carbon\Carbon::parse($film->created_at)->locale('ar')->isoFormat('D MMM, YYYY') }}</p>
            </div>

            <div class="flex justify-center mb-12">
                @if ($film->file)
                    <video class="w-full sm:w-11/12 lg:w-9/12 xl:w-8/12 h-[60vh] sm:h-[70vh] lg:h-[80vh] xl:h-[85vh] rounded-lg shadow-lg" controls>
                        <source src="{{ asset('storage/'. $film->file->video_url) }}" type="video/mp4">
                        <p>متصفحك لا يدعم تشغيل الفيديو.</p>
                    </video>
                @else
                    <p class="text-center text-lg text-gray-400 mt-6">لا يوجد فيديو مرتبط بهذا الفيلم بعد.</p>
                @endif
            </div>

            <div class="mb-12">
                <h2 class="text-3xl font-bold text-center text-white mb-6">أفلام أخرى قد تعجبك</h2>
                <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-6">
                    @foreach($other_films as $other_film)
                    <div class="film-card bg-gray-800 text-white rounded-lg shadow-lg overflow-hidden">
                        <a href="{{route('films.show' , $other_film)}}">
                            <div class="relative overflow-hidden rounded-md shadow-lg group">
                                <img 
                                    src="{{ $other_film->cover_url }}" 
                                    alt="{{ $other_film->name }}" 
                                    class="object-cover w-full h-[300px] sm:h-[350px] md:h-[400px] transition-transform duration-300 group-hover:scale-105 group-hover:blur-sm"
                                />
                                <div class="absolute inset-0 flex justify-center items-center bg-black bg-opacity-50 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                    <h3 class="text-white text-3xl font-semibold">{{ $other_film->name }}</h3>
                                </div>
                            </div>
                        </a>
                    </div>  
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    
    @if($ad)
    <div id="popup-ad" class="fixed inset-0 bg-black bg-opacity-60 flex justify-center items-center z-50 opacity-0 pointer-events-none transition-all duration-500">
        <div class="bg-white p-8 rounded-lg w-full max-w-md sm:max-w-sm relative shadow-lg">
            <button id="close-ad" class="absolute top-0 right-0 p-2 text-gray-600 text-2xl opacity-0 pointer-events-none transition-opacity duration-500 hover:text-gray-900">&times;</button>
            
            <a href="{{ $ad->url }}" target="_blank" class="block">
                <p class="text-sm text-muted text-center">إعلان</p>
                <img src="{{ $ad->cover_url }}" alt="{{ $ad->title }}" class="mt-2 w-full h-[200px] sm:h-[250px] object-cover rounded-lg mb-4">
                <h3 class="text-lg font-semibold text-gray-800 text-center">{{ $ad->title }}</h3>
            </a>
        </div>
    </div>
    @endif



@endsection

@push('scripts')
document.addEventListener("DOMContentLoaded", () => {
    const popupAd = document.getElementById("popup-ad");
    const closeButton = document.getElementById("close-ad");

    setTimeout(() => {
        popupAd.classList.remove("opacity-0", "pointer-events-none");
        popupAd.classList.add("opacity-100", "pointer-events-auto");
    }, 3000);

    setTimeout(() => {
        closeButton.classList.remove("opacity-0", "pointer-events-none");
        closeButton.classList.add("opacity-100", "pointer-events-auto");
    }, 8000);

    closeButton.addEventListener("click", () => {
        popupAd.classList.remove("opacity-100", "pointer-events-auto");
        popupAd.classList.add("opacity-0", "pointer-events-none");
    });
});
@endpush