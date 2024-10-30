@if ($paginator->hasPages())
    <div class="flex justify-between items-center mt-4">
        <span class="text-sm text-gray-700">
            Mostrando {{ $paginator->firstItem() }} até {{ $paginator->lastItem() }} de {{ $paginator->total() }} resultados
        </span>

        <nav aria-label="Pagination">
            <ul class="flex space-x-2 text-xs">
                @if ($paginator->onFirstPage())
                    <li>
                        <span class="px-3 py-2 text-gray-500 bg-white border border-gray-300 rounded-md cursor-not-allowed">@lang('pagination.previous')</span>
                    </li>
                @else
                    <li>
                        <a href="{{ $paginator->previousPageUrl() }}" class="px-3 py-2 text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-white">@lang('pagination.previous')</a>
                    </li>
                @endif

                @for ($i = 1; $i <= $paginator->lastPage(); $i++)
                    @if ($i > $paginator->currentPage() - 2 && $i < $paginator->currentPage() + 3)
                        <li>
                            <a href="{{ $paginator->url($i) }}" class="px-3 py-2 {{ ($i == $paginator->currentPage()) ? 'bg-primary-600 text-white' : 'text-gray-700 bg-white border border-gray-300' }} rounded-md">
                                {{ $i }}
                            </a>
                        </li>
                    @endif
                @endfor

                @if ($paginator->hasMorePages())
                    <li>
                        <a href="{{ $paginator->nextPageUrl() }}" class="px-3 py-2 text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-white">@lang('pagination.next')</a>
                    </li>
                @else
                    <li>
                        <span class="px-3 py-2 text-gray-500 bg-white border border-gray-300 rounded-md cursor-not-allowed">@lang('pagination.next')</span>
                    </li>
                @endif
            </ul>
        </nav>
    </div>
@endif
