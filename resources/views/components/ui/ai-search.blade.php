<div class="ai-search-model hidden" id="ai-search-model">
    <div class="ai-search-container">
        <div class="ai-search-close-switch" id="close-ai-search">
            <i class="icon_close"></i>
        </div>

        <form class="ai-search-model-form ml-6 mr-6 mt-3 mb-3" action="{{ route('search.ai') }}" method="GET">
            <input type="text" id="ai-search-input" name="query" placeholder="{{ __('messages.ai_search_placeholder') }}" />
        </form>
    </div>
</div>
