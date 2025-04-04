@if ($paginator->hasPages())
    <nav role="navigation" aria-label="{{ __('Pagination Navigation') }}" class="flex justify-center mt-4">
        <ul class="inline-flex space-x-2 bg-gray-900 p-3 rounded-lg border border-gray-700">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="px-3 py-1 text-gray-500 cursor-not-allowed bg-gray-800 rounded-md">Previous</li>
            @else
                <li>
                    <a href="{{ $paginator->previousPageUrl() }}" class="px-3 py-1 bg-gray-700 text-white rounded-md hover:bg-gray-600 transition duration-200">
                        Previous
                    </a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                @if (is_string($element))
                    <li class="px-3 py-1 text-gray-500">...</li>
                @endif

                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="px-3 py-1 bg-blue-600 text-white rounded-md">{{ $page }}</li>
                        @else
                            <li>
                                <a href="{{ $url }}" class="px-3 py-1 bg-gray-700 text-white rounded-md hover:bg-gray-600 transition duration-200">
                                    {{ $page }}
                                </a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li>
                    <a href="{{ $paginator->nextPageUrl() }}" class="px-3 py-1 bg-gray-700 text-white rounded-md hover:bg-gray-600 transition duration-200">
                        Next
                    </a>
                </li>
            @else
                <li class="px-3 py-1 text-gray-500 cursor-not-allowed bg-gray-800 rounded-md">Next</li>
            @endif
        </ul>
    </nav>
@endif
