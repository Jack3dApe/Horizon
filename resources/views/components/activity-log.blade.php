<div class="divide-y">
    @forelse($logs as $log)
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
    @empty
        <div>
            <div class="row">
                <div class="col">
                    <li>No recent activities found.</li>
                </div>
            </div>
        </div>
    @endforelse
</div>
