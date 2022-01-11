@if ($paginator->hasPages())
<div class="exxefy-pagination text-center margin-top-60">
    <ul>
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="disabled">
                <a class="prev page-numbers" href="{{ $paginator->previousPageUrl() }}"><i class="ti-angle-left"></i></a>
            </li>
        @else
            <li>
                <a class="prev page-numbers" href="{{ $paginator->previousPageUrl() }}" rel="prev"><i class="ti-angle-left"></i></a>
            </li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="disabled" aria-disabled="true"><span>{{ $element }}</span></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li aria-current="page">
                            <span class="page-numbers current">{{ $page }}</span>
                        </li>
                    @else
                        <li>
                            <a class="page-numbers" href="{{ $url }}">{{ $page }}</a>
                        </li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li>
                <a class="next page-numbers" href="{{ $paginator->nextPageUrl() }}"><i class="ti-angle-right"></i></a>
            </li>
        @else
            <li>
                <a class="disabled next page-numbers" href="{{ $paginator->nextPageUrl() }}"><i class="ti-angle-right"></i></a>
            </li>
        @endif
    </ul>
</div>
@endif
