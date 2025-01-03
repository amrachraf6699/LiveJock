@extends('browse.layout')
@section('title', 'الأفلام')

@section('content')
<div class="container mx-auto">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">تصفح أفلامنا</h1>
        <div id="search-icon" class="cursor-pointer">
            <svg class="w-6 h-6 text-gray-500 hover:text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35m1.35-5.65a7 7 0 11-14 0 7 7 0 0114 0z"></path>
            </svg>
        </div>
    </div>
    

    <div id="search-modal" class="fixed inset-0 bg-black bg-opacity-50 hidden flex justify-center items-center z-50">
        <div class="bg-white p-8 rounded-lg shadow-lg w-full sm:w-96 max-w-lg">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold text-gray-800">ابحث عن فيلم</h2>
                <button id="close-search" class="text-gray-600 text-2xl font-bold">&times;</button>
            </div>
            
            <!-- Search input -->
            <input 
                type="text" 
                id="search-input-modal" 
                class="w-full p-4 bg-gray-100 text-gray-800 rounded-lg shadow-md focus:outline-none focus:ring-2 focus:ring-blue-600 mb-6"
                placeholder="ابحث عن فيلم..."
                name="search"
                value="{{ request('search') }}"
            />
    
            <!-- Sort option -->
            <select id="sort-select-modal" class="w-full p-4 bg-gray-100 text-gray-800 rounded-lg shadow-md focus:outline-none focus:ring-2 focus:ring-blue-600 mb-6">
                <option value="" selected>ترتيب حسب</option>
                <option value="newest" {{ request('sort') === 'newest' ? 'selected' : '' }}>الأحدث</option>
                <option value="oldest" {{ request('sort') === 'oldest' ? 'selected' : '' }}>الأقدم</option>
            </select>
    
            <!-- Search confirmation button -->
            <button type="submit" id="search-confirm" class="w-full p-4 bg-black text-white rounded-lg border shadow-md hover:bg-white hover:text-black hover:border border-black transition-colors duration-300">
                تأكيد البحث
            </button>
        </div>
    </div>
    

    <div id="films-container" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
        @forelse($films as $film)
            <a href="{{ route('films.show' , $film) }}" class="relative overflow-hidden rounded-md shadow-lg group">
                <div class="relative overflow-hidden rounded-md shadow-lg group">
                    <img 
                        src="{{ $film->cover_url }}" 
                        alt="{{ $film->name }}" 
                        class="object-cover w-full h-[300px] sm:h-[350px] md:h-[400px] transition-transform duration-300 group-hover:scale-105 group-hover:blur-sm"
                    />
                    <div class="absolute inset-0 flex justify-center items-center bg-black bg-opacity-50 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        <h3 class="text-white text-3xl font-semibold">{{ $film->name }}</h3>
                    </div>
                </div>
            </a>
        @empty
            <div class="col-span-full flex justify-center items-center text-center mt-12">
                <div class="bg-gray-800 text-white p-6 rounded-lg shadow-lg max-w-md w-full">
                    <div class="flex justify-center mb-4">
                        <i class="bx bxs-error-circle text-6xl"></i>
                    </div>
                    @if(request('search'))
                        <h3 class="text-2xl font-semibold mb-4">عذراً، لا توجد أفلام</h3>
                        <p class="text-gray-400 text-lg">لا يوجد أفلام تطابق بحثك عن "{{ request('search') }}".</p>
                    @else
                        <h3 class="text-2xl font-semibold mb-4">عذراً، لا توجد أفلام حالياً</h3>
                        <p class="text-gray-400 text-lg">الرجاء العودة لاحقاً أو تصفح قسم آخر.</p>
                    @endif
                </div>
            </div>        
        @endforelse
    </div>
    
    <div class="mt-6">
        {{ $films->links('pagination::tailwind') }}
    </div>
</div>
@endsection

@push('scripts')
document.getElementById('search-icon').addEventListener('click', function() {
    document.getElementById('search-modal').classList.remove('hidden');
});

document.getElementById('close-search').addEventListener('click', function() {
    document.getElementById('search-modal').classList.add('hidden');
});

document.getElementById('search-confirm').addEventListener('click', function() {
    const searchQuery = document.getElementById('search-input-modal').value;
    const sortOption = document.getElementById('sort-select-modal').value;
    
    console.log('البحث عن:', searchQuery);
    console.log('ترتيب حسب:', sortOption);

    window.location.href = `?search=${searchQuery}&sort=${sortOption}`;
    
    document.getElementById('search-modal').classList.add('hidden');
});
@endpush
