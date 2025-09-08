@if ($paginator->hasPages())
    <div class="flex justify-end items-center gap-2 p-4">
        {{-- Prev button --}}
        @if ($paginator->onFirstPage())
            <button class="px-3 py-1 rounded-xl bg-gray-900 text-gray-400 cursor-not-allowed" disabled>Prev</button>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" class="px-3 py-1 rounded-xl bg-gray-900 text-indigo-300 hover:bg-gray-800 transition">Prev</a>
        @endif

        {{-- Page numbers --}}
        @foreach ($elements as $element)
            @if (is_string($element))
                <span class="px-3 py-1 rounded-xl bg-gray-900 text-gray-400">{{ $element }}</span>
            @endif
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <a href="{{ $url }}" class="px-3 py-1 rounded-xl bg-indigo-600 text-white font-bold shadow border border-indigo-700 cursor-default pointer-events-none">{{ $page }}</a>
                    @else
                        <a href="{{ $url }}" class="px-3 py-1 rounded-xl bg-gray-900 text-indigo-300 hover:bg-gray-800 transition">{{ $page }}</a>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next button --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" class="px-3 py-1 rounded-xl bg-gray-900 text-indigo-300 hover:bg-gray-800 transition">Next</a>
        @else
            <button class="px-3 py-1 rounded-xl bg-gray-900 text-gray-400 cursor-not-allowed" disabled>Next</button>
        @endif
    </div>
@endif