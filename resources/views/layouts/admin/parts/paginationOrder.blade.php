<p class="m-0 text-secondary">
    Showing <span>{{ $orders->firstItem() }}</span> to <span>{{ $orders->lastItem() }}</span> of <span>{{ $orders->total() }}</span> records
</p>
<ul class="pagination m-0 ms-auto">
    <!-- Link to previous page -->
    <li class="page-item {{ $orders->onFirstPage() ? 'disabled' : '' }}">
        <a class="page-link" href="{{ $orders->previousPageUrl() }}" tabindex="-1" aria-disabled="{{ $orders->onFirstPage() }}">
            <!-- Icon for previous page -->
            <i class="ti ti-chevron-left"></i>
            Prev
        </a>
    </li>

    <!-- Links to individual pages -->
    @for ($page = 1; $page <= $orders->lastPage(); $page++)
        <li class="page-item {{ $page == $orders->currentPage() ? 'active' : '' }}">
            <a class="page-link" href="{{ $orders->url($page) }}">{{ $page }}</a>
        </li>
    @endfor

    <!-- Link to next page -->
    <li class="page-item {{ $orders->hasMorePages() ? '' : 'disabled' }}">
        <a class="page-link" href="{{ $orders->nextPageUrl() }}">
            Next
            <!-- Icon for next page -->
            <i class="ti ti-chevron-right"></i>
        </a>
    </li>
</ul>
