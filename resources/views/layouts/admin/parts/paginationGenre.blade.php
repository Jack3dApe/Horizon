<p class="m-0 text-secondary">
    Showing <span>{{ $genres->firstItem() }}</span> to <span>{{ $genres->lastItem() }}</span> of <span>{{ $genres->total() }}</span> records
</p>
<ul class="pagination m-0 ms-auto">
    <!-- Link to previous page -->
    <li class="page-item {{ $genres->onFirstPage() ? 'disabled' : '' }}">
        <a class="page-link" href="{{ $genres->previousPageUrl() }}" tabindex="-1" aria-disabled="{{ $genres->onFirstPage() }}">
            <!-- Icon for previous page -->
            <i class="ti ti-chevron-left"></i>
            Prev
        </a>
    </li>

    <!-- Links to individual pages -->
    @for ($page = 1; $page <= $genres->lastPage(); $page++)
        <li class="page-item {{ $page == $genres->currentPage() ? 'active' : '' }}">
            <a class="page-link" href="{{ $genres->url($page) }}">{{ $page }}</a>
        </li>
    @endfor

    <!-- Link to next page -->
    <li class="page-item {{ $genres->hasMorePages() ? '' : 'disabled' }}">
        <a class="page-link" href="{{ $genres->nextPageUrl() }}">
            Next
            <!-- Icon for next page -->
            <i class="ti ti-chevron-right"></i>
        </a>
    </li>
</ul>
