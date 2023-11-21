{{--@if ($paginator->hasPages())--}}
{{--    <nav class="d-flex justify-items-center justify-content-between">--}}
{{--        <div class="d-flex justify-content-between flex-fill d-sm-none">--}}
{{--            <ul class="pagination">--}}
{{--                --}}{{-- Previous Page Link --}}
{{--                @if ($paginator->onFirstPage())--}}
{{--                    <li class="page-item disabled" aria-disabled="true">--}}
{{--                        <span class="page-link">@lang('pagination.previous')</span>--}}
{{--                    </li>--}}
{{--                @else--}}
{{--                    <li class="page-item">--}}
{{--                        <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev">@lang('pagination.previous')</a>--}}
{{--                    </li>--}}
{{--                @endif--}}

{{--                --}}{{-- Next Page Link --}}
{{--                @if ($paginator->hasMorePages())--}}
{{--                    <li class="page-item">--}}
{{--                        <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next">@lang('pagination.next')</a>--}}
{{--                    </li>--}}
{{--                @else--}}
{{--                    <li class="page-item disabled" aria-disabled="true">--}}
{{--                        <span class="page-link">@lang('pagination.next')</span>--}}
{{--                    </li>--}}
{{--                @endif--}}
{{--            </ul>--}}
{{--        </div>--}}

{{--        <div class="d-none flex-sm-fill d-sm-flex align-items-sm-center justify-content-sm-between">--}}
{{--            <div>--}}
{{--                <p class="small text-muted">--}}
{{--                    {!! __('Showing') !!}--}}
{{--                    <span class="fw-semibold">{{ $paginator->firstItem() }}</span>--}}
{{--                    {!! __('to') !!}--}}
{{--                    <span class="fw-semibold">{{ $paginator->lastItem() }}</span>--}}
{{--                    {!! __('of') !!}--}}
{{--                    <span class="fw-semibold">{{ $paginator->total() }}</span>--}}
{{--                    {!! __('results') !!}--}}
{{--                </p>--}}
{{--            </div>--}}

{{--            <div>--}}
{{--                <ul class="pagination">--}}
{{--                    --}}{{-- Previous Page Link --}}
{{--                    @if ($paginator->onFirstPage())--}}
{{--                        <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">--}}
{{--                            <span class="page-link" aria-hidden="true">&lsaquo;</span>--}}
{{--                        </li>--}}
{{--                    @else--}}
{{--                        <li class="page-item">--}}
{{--                            <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>--}}
{{--                        </li>--}}
{{--                    @endif--}}

{{--                    --}}{{-- Pagination Elements --}}
{{--                    @foreach ($elements as $element)--}}
{{--                        --}}{{-- "Three Dots" Separator --}}
{{--                        @if (is_string($element))--}}
{{--                            <li class="page-item disabled" aria-disabled="true"><span class="page-link">{{ $element }}</span></li>--}}
{{--                        @endif--}}

{{--                        --}}{{-- Array Of Links --}}
{{--                        @if (is_array($element))--}}
{{--                            @foreach ($element as $page => $url)--}}
{{--                                @if ($page == $paginator->currentPage())--}}
{{--                                    <li class="page-item active" aria-current="page"><span class="page-link">{{ $page }}</span></li>--}}
{{--                                @else--}}
{{--                                    <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>--}}
{{--                                @endif--}}
{{--                            @endforeach--}}
{{--                        @endif--}}
{{--                    @endforeach--}}

{{--                    --}}{{-- Next Page Link --}}
{{--                    @if ($paginator->hasMorePages())--}}
{{--                        <li class="page-item">--}}
{{--                            <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>--}}
{{--                        </li>--}}
{{--                    @else--}}
{{--                        <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">--}}
{{--                            <span class="page-link" aria-hidden="true">&rsaquo;</span>--}}
{{--                        </li>--}}
{{--                    @endif--}}
{{--                </ul>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </nav>--}}
{{--@endif--}}

@if ($paginator->hasPages())
    <div class="text-center py-4">
        <div class="custom-pagination">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <a href="#" class="prev disabled">Previous</a>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" class="prev">Previous</a>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <span class="ellipsis">{{ $element }}</span>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <a href="{{ $url }}" class="active">{{ $page }}</a>
                        @else
                            <a href="{{ $url }}">{{ $page }}</a>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" class="next">Next</a>
            @else
                <a href="#" class="next disabled">Next</a>
            @endif
        </div>
    </div>
@endif
