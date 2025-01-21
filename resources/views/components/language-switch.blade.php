<!--
<div>
    <ul>
        <li><a href="{{ route('switch.language', 'en') }}" class="{{ app()->getLocale() === 'en' ? 'active' : '' }}">English</a></li>
        <li><a href="{{ route('switch.language', 'pt') }}" class="{{ app()->getLocale() === 'pt' ? 'active' : '' }}">Português</a></li>
    </ul>
</div>
-->
<!--
<div class="language-switcher">
    <a href="{{ route('switch.language', 'en') }}" class="{{ app()->getLocale() === 'en' ? 'active' : '' }}">
        🇬🇧
    </a>
    <label class="switch">
        <input type="checkbox" onchange="toggleLanguage()" {{ app()->getLocale() === 'pt' ? 'checked' : '' }}>
        <span class="slider"></span>
    </label>
    <a href="{{ route('switch.language', 'pt') }}" class="{{ app()->getLocale() === 'pt' ? 'active' : '' }}">
        🇵🇹
    </a>
</div>

<script>
    function toggleLanguage() {
        const currentLocale = '{{ app()->getLocale() }}';
        const newLocale = currentLocale === 'en' ? 'pt' : 'en';
        window.location.href = `/switch-language/${newLocale}`;
    }
</script>

<style>
    .language-switcher {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
    }

    .switch {
        position: relative;
        display: inline-block;
        width: 50px;
        height: 24px;
    }

    .switch input {
        opacity: 0;
        width: 0;
        height: 0;
    }

    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        border-radius: 34px;
        transition: 0.4s;
    }

    .slider:before {
        position: absolute;
        content: "";
        height: 18px;
        width: 18px;
        left: 4px;
        bottom: 3px;
        background-color: white;
        border-radius: 50%;
        transition: 0.4s;
    }

    input:checked + .slider {
        background-color: #2196F3;
    }

    input:checked + .slider:before {
        transform: translateX(26px);
    }

    .active {
        font-weight: bold;
    }
</style>
-->

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

<!--
    <button class="btn dropdown-toggle d-flex align-items-center" type="button" id="languageMenu" data-bs-toggle="dropdown" aria-expanded="false">
        @if(app()->getLocale() === 'en')
            <img
                alt="Grand Britain"
                src="http://purecatamphetamine.github.io/country-flag-icons/3x2/GB.svg"/>

        @elseif(app()->getLocale() === 'pt')
            <img
                alt="Portugal"
                src="http://purecatamphetamine.github.io/country-flag-icons/3x2/PT.svg"/>
        @endif
    </button>
    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="languageMenu">
        <li>
            <a href="{{ route('switch.language', 'en') }}" class="dropdown-item d-flex align-items-center">
                <img
                    alt="Grand Britain"
                    src="http://purecatamphetamine.github.io/country-flag-icons/3x2/GB.svg"/>
            </a>
        </li>
        <li>
            <a href="{{ route('switch.language', 'pt') }}" class="dropdown-item d-flex align-items-center">
                <img
                    alt="Portugal"
                    src="http://purecatamphetamine.github.io/country-flag-icons/3x2/PT.svg"/>
            </a>
        </li>
    </ul>

-->
