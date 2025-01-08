@extends('layouts.app')
@section('title', 'البحث')
@section('content')
<div class="p-8 bg-[#dba235] rounded-lg shadow-md">
    <h2 class="text-2xl font-semibold text-white text-center mb-6">ابحث عن المحتوى</h2>
    <div class="relative w-full max-w-xl mx-auto">
        <input 
            type="text" 
            id="search-input" 
            placeholder="أدخل كلمات البحث..." 
            class="w-full px-4 py-3 border text-gray-700 border-gray-300 rounded-lg shadow focus:outline-none focus:ring-2 focus:ring-[#dba235] focus:border-transparent"
        >
        <div id="loading-spinner" class="hidden mt-6 text-center">
            <img src="{{ asset('loading.svg') }}" alt="Loading" class="mx-auto w-16 h-16 filter-gold">
            <p class="text-black font-semibold mt-2">جاري البحث...</p>
        </div>
        <div id="search-results" class="mt-6 hidden">
            <!-- النتائج ستظهر هنا -->
        </div>
    </div>
</div>


<script>
    const searchInput = document.getElementById('search-input');
    const resultsContainer = document.getElementById('search-results');
    const loadingSpinner = document.getElementById('loading-spinner');

    const sectionTranslations = {
    films: "أفلام",
    podcasts: "بودكاست",
    programs: "برامج",
    serieses: "مسلسلات",
    channels: "قنوات عيش جوك",
    children: "عروض الأطفال",
    };


    searchInput.addEventListener('input', function () {
        let query = this.value;

        if (query.length > 0) {
            resultsContainer.innerHTML = '';
            resultsContainer.classList.add('hidden');
            loadingSpinner.classList.remove('hidden');

            // Add a 2-second delay using setTimeout
            setTimeout(() => {
                fetch(`{{ route('search.json') }}?q=${query}`)
                    .then(response => response.json())
                    .then(data => {
                        loadingSpinner.classList.add('hidden');
                        resultsContainer.classList.remove('hidden');

                        if (Object.values(data).flat().length > 0) {
                            Object.entries(data).forEach(([section, items]) => {
                                if (items.length > 0) {
                                    const sectionTitle = sectionTranslations[section] || section;

                                    resultsContainer.innerHTML += `
                                        <div class="mt-8 border-b border-white pb-4">
                                            <h3 class="text-2xl text-center font-semibold text-white capitalize mb-2">${sectionTitle}</h3>
                                            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-4">
                                                ${items.map(item => `
                                                    <a href="/${section}/${item.slug}" 
                                                        class="w-36 h-44 text-white rounded-lg relative overflow-hidden group flex-shrink-0 transition-all duration-300 ease-in-out shadow-lg hover:shadow-xl transform group-hover:scale-105 group-hover:rotate-2 group-hover:translate-y-2">
                                                        <img src="${item.cover_url}" 
                                                            alt="${item.name}" 
                                                            class="w-full h-full object-cover transition-all duration-300 ease-in-out group-hover:opacity-80">
                                                        <div class="absolute inset-0 flex items-center justify-center bg-[#dba235] bg-opacity-10 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                                            <div class="text-center">
                                                                <h4 class="text-xs font-bold transform group-hover:scale-110 transition-all duration-300">
                                                                    ${item.name}
                                                                </h4>
                                                                <i class='bx bx-play-circle mt-2'></i>
                                                            </div>
                                                        </div>
                                                    </a>
                                                `).join('')}
                                            </div>
                                        </div>
                                    `;
                                }
                            });
                        } else {
                            resultsContainer.innerHTML = `
                                <p class="text-2xl mt-4 text-white text-center">لا توجد نتائج مطابقة.</p>
                            `;
                        }
                    })
                    .catch(error => {
                        loadingSpinner.classList.add('hidden');
                        resultsContainer.innerHTML = `
                            <p class="text-red-500 text-center">حدث خطأ أثناء جلب البيانات.</p>
                        `;
                    });
            }, 2000);
        } else {
            resultsContainer.classList.add('hidden');
            loadingSpinner.classList.add('hidden');
        }
    });
</script>

@endsection
