@if ($paginator->hasPages())
    <nav aria-label="Page navigation example">
        <ul class="pagination pagination-primary  justify-content-center">
            @if ($paginator->onFirstPage())
            <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
            </li>
            @else
            <li class="page-item ">
                <a class="page-link" href="{{ $paginator->previousPageUrl() }}" tabindex="-1" aria-disabled="true">Previous</a>
            </li>
               
            @endif
            @foreach ($elements as $element)
                @if (is_string($element))
                <li class="page-item disabled"><a class="page-link" href="#"></a></li>
                @endif
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item active"><a class="page-link" href="#">{{ $page }}</a></li>
                           
                        @else
                            <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            @if ($paginator->hasMorePages())
            <li class="page-item">
                <a class="page-link" href="{{ $paginator->nextPageUrl() }}">Next</a>
            </li>
                
            @else
            <li class="page-item disabled">
                <a class="page-link" href="#">Next</a>
            </li>
            @endif

        </ul>
    </div>
@endif

   
      