<p class="m-0 text-secondary">
    Showing <span>{{ $publishers->firstItem() }}</span> to <span>{{ $publishers->lastItem() }}</span> of <span>{{ $publishers->total() }}</span> records
</p>
<ul class="pagination m-0 ms-auto">
    <!-- Link to previous page -->
    <li class="page-item {{ $publishers->onFirstPage() ? 'disabled' : '' }}">
        <a class="page-link" href="{{ $publishers->previousPageUrl() }}" tabindex="-1" aria-disabled="{{ $publishers->onFirstPage() }}">
            <!-- Icon for previous page -->
            <i class="ti ti-chevron-left"></i>
            Prev
        </a>
    </li>

    <!-- Links to individual pages -->
    @for ($page = 1; $page <= $publishers->lastPage(); $page++)
        <li class="page-item {{ $page == $publishers->currentPage() ? 'active' : '' }}">
            <a class="page-link" href="{{ $publishers->url($page) }}">{{ $page }}</a>
        </li>
    @endfor

    <!-- Link to next page -->
    <li class="page-item {{ $publishers->hasMorePages() ? '' : 'disabled' }}">
        <a class="page-link" href="{{ $publishers->nextPageUrl() }}">
            Next
            <!-- Icon for next page -->
            <i class="ti ti-chevron-right"></i>
        </a>
    </li>
</ul>
