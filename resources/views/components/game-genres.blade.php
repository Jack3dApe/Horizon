@if($genres->isNotEmpty())
    {{ $genres->pluck('name')->join(', ') }}
@else
    <span class="text-secondary">No Genres</span>
@endif
