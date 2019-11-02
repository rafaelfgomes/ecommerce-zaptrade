@if ($paginator->hasPages())
    <ul>
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li>
                <a class="disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">&lsaquo;</a>
            </li>
        @else
            <li>
                <a href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>
            </li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li>
                    <a class="disabled" aria-disabled="true">{{ $element }}</a>
                </li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li>
                            <a class="active" style="background-color: #faa35c;" aria-current="page">{{ $page }}</a>
                        </li>
                    @else
                        <li>
                            <a href="{{ $url }}">{{ $page }}</a>
                        </li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li class="page-item">
                <a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
            </li>
        @else
            <li>
                <a class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                &rsaquo;</a>
            </li>
        @endif
    </ul>
@endif
