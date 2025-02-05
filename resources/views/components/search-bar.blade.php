<div class="search-model d-none" id="search-model">
    <div class="h-100 d-flex align-items-center justify-content-center">
        <div class="search-close-switch" id="close-search"><i class="icon_close"></i></div>

        <form class="search-model-form" action="{{ route('search') }}" method="GET">
            <input type="text" id="search-input" name="query" placeholder="{{ __('messages.search_placeholder') }}" />
        </form>
    </div>
</div>
