<p class="m-0 text-secondary">
    A mostrar <span>{{ $autores->firstItem() }}</span> a <span>{{ $autores->lastItem() }}</span> de <span>{{ $autores->total() }}</span> registos
</p>
<ul class="pagination m-0 ms-auto">
    <!-- Link para página anterior -->
    <li class="page-item {{ $autores->onFirstPage() ? 'disabled' : '' }}">
        <a class="page-link" href="{{ $autores->previousPageUrl() }}" tabindex="-1" aria-disabled="{{ $autores->onFirstPage() }}">
            <!-- Ícone para página anterior -->
            <i class="ti ti-chevron-left"></i>
            prev
        </a>
    </li>

    <!-- Links para as páginas -->
    @for ($page = 1; $page <= $autores->lastPage(); $page++)
        <li class="page-item {{ $page == $autores->currentPage() ? 'active' : '' }}">
            <a class="page-link" href="{{ $autores->url($page) }}">{{ $page }}</a>
        </li>
    @endfor

    <!-- Link para próxima página -->
    <li class="page-item {{ $autores->hasMorePages() ? '' : 'disabled' }}">
        <a class="page-link" href="{{ $autores->nextPageUrl() }}">
            next
            <!-- Ícone para próxima página -->
            <i class="ti ti-chevron-right"></i>
        </a>
    </li>
</ul>

