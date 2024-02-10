@if ($paginator->hasPages())
    <nav aria-label="{{ __('Pagination Navigation') }}" class="flex items-center justify-between">
        <ul class="flex items-center gap-2">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="px-3 py-2 font-medium" aria-disabled="true" aria-label="{{ __('pagination.previous') }}">
                    Précédent
                </li>
            @else
                <li class="px-3 py-2 font-medium underline">
                    <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="pagination-link">
                        Précédent</a>
                </li>
            @endif
            {{ $paginator->currentPage() }} / {{ $paginator->lastPage() }}
            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="px-3 py-2 font-medium underline">
                    <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="pagination-link">Suivant</a>
                </li>
            @else
                <li class="px-3 py-2 font-medium" aria-disabled="true" aria-label="{{ __('pagination.next') }}">
                    <span class="pagination-link" aria-hidden="true">Suivant</span>
                </li>
            @endif
        </ul>
    </nav>
@endif
