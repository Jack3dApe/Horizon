<div class="activity-log">
    <h5>Recent Activities</h5>
    <ul>
        @forelse($logs as $log)
            <li>
                <strong>{{ ucfirst($log->action) }}</strong>
                {{ $log->model }}
                (ID: {{ $log->model_id ?? 'N/A' }})
                @if($log->user_name)
                    by {{ $log->user_name }}
                @else
                    by User {{ $log->user_id }}
                @endif
                on {{ $log->created_at->format('Y-m-d H:i') }}
            </li>
        @empty
            <li>No recent activities found.</li>
        @endforelse
    </ul>
</div>
