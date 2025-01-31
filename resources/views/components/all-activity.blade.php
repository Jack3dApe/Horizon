<div class="divide-y">
    @forelse($logs as $log)
        @if($log->id) <!-- Verifica se o log tem um ID válido antes de exibi-lo -->
        <div class="log-item" data-log-id="{{ $log->id }}">
            <div class="row align-items-center">
                <div class="col-auto">
                    <span class="avatar">{{ strtoupper(substr($log->user_name ?? 'U' . $log->user_id, 0, 2)) }}</span>
                </div>
                <div class="col">
                    <div class="text-truncate">
                        <strong>{{ ucfirst($log->user_name ?? 'User ' . $log->user_id) }}</strong>
                        performed <strong>{{ ucfirst($log->action) }}</strong>
                        on <strong>{{ $log->model }}</strong>
                        ({{ $log->associated_name ?? 'Unknown' }}).
                    </div>
                    <div class="text-secondary">{{ $log->created_at->diffForHumans() }}</div>
                </div>
                <div class="col-auto align-self-center">
                    <div class="badge bg-primary badge-visible"></div>
                </div>
            </div>
        </div>
        @endif
    @empty
        <p class="text-center">No recent activities found.</p>
    @endforelse
</div>

<div class="divide-y">
    <p class="m-0 text-secondary" style="padding-top: 15px;">
        Showing <span>{{ $logs->firstItem() }}</span> to <span>{{ $logs->lastItem() }}</span> of <span>{{ $logs->total() }}</span> records
    </p>
    <ul class="pagination m-0 ms-auto">
        <!-- Link para a página anterior -->
        <li class="page-item {{ $logs->onFirstPage() ? 'disabled' : '' }}">
            <a class="page-link" href="{{ $logs->previousPageUrl() }}" tabindex="-1" aria-disabled="{{ $logs->onFirstPage() }}">
                <i class="ti ti-chevron-left"></i>
                Prev
            </a>
        </li>

        <!-- Links para as páginas individuais -->
        @for ($page = 1; $page <= $logs->lastPage(); $page++)
            <li class="page-item {{ $page == $logs->currentPage() ? 'active' : '' }}">
                <a class="page-link" href="{{ $logs->url($page) }}">{{ $page }}</a>
            </li>
        @endfor

        <!-- Link para a próxima página -->
        <li class="page-item {{ $logs->hasMorePages() ? '' : 'disabled' }}">
            <a class="page-link" href="{{ $logs->nextPageUrl() }}">
                Next
                <i class="ti ti-chevron-right"></i>
            </a>
        </li>
    </ul>
</div>
