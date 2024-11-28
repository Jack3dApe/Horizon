<p class="m-0 text-secondary">
    Showing <span>{{ $reviews->firstItem() }}</span> to <span>{{ $reviews->lastItem() }}</span> of <span>{{ $reviews->total() }}</span> records
</p>
<ul class="pagination m-0 ms-auto">
    <!-- Link to previous page -->
    <li class="page-item {{ $reviews->onFirstPage() ? 'disabled' : '' }}">
        <a class="page-link" href="{{ $reviews->previousPageUrl() }}" tabindex="-1" aria-disabled="{{ $reviews->onFirstPage() }}">
            <!-- Icon for previous page -->
            <i class="ti ti-chevron-left"></i>
            Prev
        </a>
    </li>

    <!-- Links to individual pages -->
    @for ($page = 1; $page <= $reviews->lastPage(); $page++)
        <li class="page-item {{ $page == $reviews->currentPage() ? 'active' : '' }}">
            <a class="page-link" href="{{ $reviews->url($page) }}">{{ $page }}</a>
        </li>
    @endfor

    <!-- Link to next page -->
    <li class="page-item {{ $reviews->hasMorePages() ? '' : 'disabled' }}">
        <a class="page-link" href="{{ $reviews->nextPageUrl() }}">
            Next
            <!-- Icon for next page -->
            <i class="ti ti-chevron-right"></i>
        </a>
    </li>
</ul>
