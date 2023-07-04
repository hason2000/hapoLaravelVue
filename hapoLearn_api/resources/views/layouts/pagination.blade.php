@if($paginator->hasPages())
    @if($paginator->onFirstPage())
        <a class="pagi-prev disabled">
            <i class="fa fa-long-arrow-alt-left"></i>
        </a>
    @else
        <a class="pagi-prev" href="{{ $paginator->previousPageUrl() }}">
            <i class="fa fa-long-arrow-alt-left"></i>
        </a>
    @endif
    @foreach($elements as $element)
        @if(is_string($element))
            <span class="pagi-dots">........</span>
        @elseif(is_array($element))
            @foreach($element as $p => $url)
                @if($p == $paginator->currentPage())
                    <a class="pagi-number pagi-active">{{ $p }}</a>
                @else
                    <a class="pagi-number" href="{{ $paginator->url($p) }}">{{ $p }}</a>
                @endif
            @endforeach
        @endif
    @endforeach

    @if($paginator->hasMorePages())
        <a class="pagi-next" href="{{ $paginator->nextPageUrl() }}">
            <i class="fa fa-long-arrow-alt-right"></i>
        </a>
    @else
        <a class="pagi-next disabled">
            <i class="fa fa-long-arrow-alt-right"></i>
        </a>
    @endif
@endif
