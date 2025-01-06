<p class="m-0 text-secondary">
    Showing <span>{{ $games->firstItem() }}</span> to <span>{{ $games->lastItem() }}</span> of <span>{{ $games->total() }}</span> records
</p>
<ul class="pagination m-0 ms-auto">
    <!-- Link to previous page -->
    <li class="page-item {{ $games->onFirstPage() ? 'disabled' : '' }}">
        <a class="page-link" href="{{ $games->previousPageUrl() }}" tabindex="-1" aria-disabled="{{ $games->onFirstPage() }}">
            <!-- Icon for previous page -->
            <i class="ti ti-chevron-left"></i>
            Prev
        </a>
    </li>

    <!-- Links to individual pages -->
    @for ($page = 1; $page <= $games->lastPage(); $page++)
        <li class="page-item {{ $page == $games->currentPage() ? 'active' : '' }}">
            <a class="page-link" href="{{ $games->url($page) }}">{{ $page }}</a>
        </li>
    @endfor

    <!-- Link to next page -->
    <li class="page-item {{ $games->hasMorePages() ? '' : 'disabled' }}">
        <a class="page-link" href="{{ $games->nextPageUrl() }}">
            Next
            <!-- Icon for next page -->
            <i class="ti ti-chevron-right"></i>
        </a>
    </li>
</ul>
