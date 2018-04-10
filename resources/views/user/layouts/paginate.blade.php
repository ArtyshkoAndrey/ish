@if ($paginator->hasPages())
	<ul class="pagination pagination-template d-flex justify-content-center">
		<li class="page-item">
			@if ($paginator->onFirstPage())
        		<a href="" class="page-link disabled">
            		<i class="fa fa-angle-left"></i>
            	</a>
            @else
				<a href="{{ $paginator->previousPageUrl() }}" class="page-link disabled" rel="prev">
            		<i class="fa fa-angle-left"></i>
            	</a>
            @endif
      	</li>
      	@foreach ($elements as $element)
            @if (is_string($element))
				<li class="page-item disabled">
                    <a href="#" class="page-link">{{$element}}</a>
                </li>
            @endif
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
						<li class="page-item">
                    		<a href="{{ $url }}" class="page-link active">{{ $page }}</a>
                		</li>
                	@else
                		<li class="page-item">
                    		<a href="{{ $url }}" class="page-link">{{ $page }}</a>
                		</li>
                	@endif
                @endforeach
            @endif
        @endforeach
        @if ($paginator->hasMorePages())
			<li class="page-item disabled">
                <a href="" class="page-link">
                    <i class="fa fa-angle-right"></i>
                </a>
            </li>
        @else
			<li class="page-item">
                <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="page-link">
                    <i class="fa fa-angle-right"></i>
                </a>
            </li>
        @endif
	</ul>
@endif