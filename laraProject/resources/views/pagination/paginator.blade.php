@if ($paginator->lastPage() != 1)
<div id="pagination" >
    {{ $paginator->firstItem() }} - {{ $paginator->lastItem() }} di {{ $paginator->total() }} 💿️🎸💿️

    
    @if (!$paginator->onFirstPage())
        <a href="{{ $paginator->url(1) }}">Inizio</a> |
    @else
        Inizio |
    @endif

    
    @if ($paginator->currentPage() != 1)
        <a href="{{ $paginator->previousPageUrl() }}"><img src="{{ asset('/images/leftRossa.png') }}" alt="precedente" /></a> |
    @else
        <img src="{{ asset('/images/left.png') }}" alt="precedente" /> |
    @endif

    
    @if ($paginator->hasMorePages())
        <a href="{{ $paginator->nextPageUrl() }}"><img src="{{ asset('/images/rightRossa.png') }}" alt="successivo" /></a> |
    @else
        <img src="{{ asset('/images/right.png') }}" alt="successivo" /> |
    @endif

    
    @if ($paginator->hasMorePages())
        <a href="{{ $paginator->url($paginator->lastPage()) }}">Fine</a>
    @else
        Fine
    @endif
</div>


@endif