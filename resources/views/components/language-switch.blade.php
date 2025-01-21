<div class="language-switch d-flex align-items-center" id="languageSwitch">
    <a href="#" class="dropdown-toggle d-flex align-items-center no-default-arrow">
        @if(app()->getLocale() === 'en')
            <img src="http://purecatamphetamine.github.io/country-flag-icons/3x2/GB.svg" alt="English">
        @elseif(app()->getLocale() === 'pt')
            <img src="http://purecatamphetamine.github.io/country-flag-icons/3x2/PT.svg" alt="Portuguese">
        @endif
    </a>
    <ul class="dropdown-menu language-dropdown p-0" style="display: none;">
        <li>
            <a href="{{ route('switch.language', 'en') }}" class="dropdown-item text-center">
                <img src="http://purecatamphetamine.github.io/country-flag-icons/3x2/GB.svg" alt="English">
            </a>
        </li>
        <li>
            <a href="{{ route('switch.language', 'pt') }}" class="dropdown-item text-center">
                <img src="http://purecatamphetamine.github.io/country-flag-icons/3x2/PT.svg" alt="Portuguese">
            </a>
        </li>
    </ul>
</div>
