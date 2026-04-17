<div class="dropdown language-switch">
    <a href="#" class="dropdown-toggle d-flex align-items-center" id="languageDropdown" data-bs-toggle="dropdown" aria-expanded="false">
        @if(app()->getLocale() === 'en')
            <img src="http://purecatamphetamine.github.io/country-flag-icons/3x2/GB.svg" alt="English" class="me-2" style="height: 20px;">
        @elseif(app()->getLocale() === 'pt')
            <img src="http://purecatamphetamine.github.io/country-flag-icons/3x2/PT.svg" alt="Portuguese" class="me-2" style="height: 20px;">
        @endif
    </a>
    <ul class="dropdown-menu dropdown-menu-end p-0" aria-labelledby="languageDropdown" style="min-width: 100px;">
        <li>
            <a href="{{ route('switch.language', 'en') }}" class="dropdown-item d-flex align-items-center">
                <img src="http://purecatamphetamine.github.io/country-flag-icons/3x2/GB.svg" alt="English" class="me-2" >
            </a>
        </li>
        <li>
            <a href="{{ route('switch.language', 'pt') }}" class="dropdown-item d-flex align-items-center">
                <img src="http://purecatamphetamine.github.io/country-flag-icons/3x2/PT.svg" alt="Portuguese" class="me-2">
            </a>
        </li>
    </ul>
</div>
