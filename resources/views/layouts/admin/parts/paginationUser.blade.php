<p class="m-0 text-secondary">
    Showing <span>{{ $users->firstItem() }}</span> to <span>{{ $users->lastItem() }}</span> of <span>{{ $users->total() }}</span> records
</p>
<ul class="pagination m-0 ms-auto">
    <!-- Link to previous page -->
    <li class="page-item {{ $users->onFirstPage() ? 'disabled' : '' }}">
        <a class="page-link" href="{{ $users->previousPageUrl() }}" tabindex="-1" aria-disabled="{{ $users->onFirstPage() }}">
            <!-- Icon for previous page -->
            <i class="ti ti-chevron-left"></i>
            Prev
        </a>
    </li>

    <!-- Links to individual pages -->
    @for ($page = 1; $page <= $users->lastPage(); $page++)
        <li class="page-item {{ $page == $users->currentPage() ? 'active' : '' }}">
            <a class="page-link" href="{{ $users->url($page) }}">{{ $page }}</a>
        </li>
    @endfor

    <!-- Link to next page -->
    <li class="page-item {{ $users->hasMorePages() ? '' : 'disabled' }}">
        <a class="page-link" href="{{ $users->nextPageUrl() }}">
            Next
            <!-- Icon for next page -->
            <i class="ti ti-chevron-right"></i>
        </a>
    </li>
</ul>
