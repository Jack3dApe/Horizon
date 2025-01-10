@if($genres->isNotEmpty())
    <span>{{ $genres->pluck('name')->join(', ') }}</span>
@else
    <span class="text-secondary">No Genres</span>
@endif
