@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination" class="flex items-center justify-center space-x-2">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <span class="px-4 py-2 text-gray-500 cursor-not-allowed bg-gray-200 rounded-full">
                <i class="bx bx-chevron-right"></i> <!-- Left arrow icon -->
            </span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="px-4 py-2 text-white bg-[#fca311] rounded-full hover:bg-[#dba235]">
                <i class="bx bx-chevron-right"></i> <!-- Left arrow icon -->
            </a>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <span class="px-4 py-2 text-white bg-[#fca311] rounded-full cursor-default">
                            {{ $page }}
                        </span>
                    @else
                        <a href="{{ $url }}" class="px-4 py-2 text-black bg-[#e5e7eb] rounded-full hover:bg-[#dba235]">
                            {{ $page }}
                        </a>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="px-4 py-2 text-white bg-[#fca311] rounded-full hover:bg-[#dba235]">
                <i class="bx bx-chevron-left"></i> <!-- Right arrow icon -->
            </a>
        @else
            <span class="px-4 py-2 text-gray-500 cursor-not-allowed bg-gray-200 rounded-full">
                <i class="bx bx-chevron-left"></i> <!-- Right arrow icon -->
            </span>
        @endif
    </nav>
@endif
