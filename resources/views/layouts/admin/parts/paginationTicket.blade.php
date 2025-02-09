<p class="m-0 text-secondary">
    Showing <span>{{ $tickets->firstItem() }}</span> to <span>{{ $tickets->lastItem() }}</span> of <span>{{ $tickets->total() }}</span> records
</p>
<ul class="pagination m-0 ms-auto">
    <!-- Link to previous page -->
    <li class="page-item {{ $tickets->onFirstPage() ? 'disabled' : '' }}">
        <a class="page-link" href="{{ $tickets->previousPageUrl() }}" tabindex="-1" aria-disabled="{{ $tickets->onFirstPage() }}">
            <!-- Icon for previous page -->
            <i class="ti ti-chevron-left"></i>
            Prev
        </a>
    </li>

    <!-- Links to individual pages -->
    @for ($page = 1; $page <= $tickets->lastPage(); $page++)
        <li class="page-item {{ $page == $tickets->currentPage() ? 'active' : '' }}">
            <a class="page-link" href="{{ $tickets->url($page) }}">{{ $page }}</a>
        </li>
    @endfor

    <!-- Link to next page -->
    <li class="page-item {{ $tickets->hasMorePages() ? '' : 'disabled' }}">
        <a class="page-link" href="{{ $tickets->nextPageUrl() }}">
            Next
            <!-- Icon for next page -->
            <i class="ti ti-chevron-right"></i>
        </a>
    </li>
</ul>
