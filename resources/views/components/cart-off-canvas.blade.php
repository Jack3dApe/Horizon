<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasCart" aria-labelledby="offcanvasCartLabel">
    <div class="offcanvas-header">
        <h5 id="offcanvasCartLabel">{{ __('messages.your_cart_title') }}</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        @forelse($cartItems as $id_game => $item)
            <div class="d-flex mb-2 align-items-center" style="border: 2px solid #e9ecef; padding: 10px 5px;border-radius: 10px">
                <!-- Imagem do jogo -->
                <img src="{{ $item['grid'] ? asset('imgs/grids/' . $item['grid']) : asset('imgs/default-game.jpg') }}"
                     alt="{{ $item['name'] }}"
                     class="img-fluid"
                     style="width: 8vw; object-fit: cover; border-radius: 10px;">

                <!-- Detalhes do jogo -->
                <div class="ms-3" style="flex-grow: 1;">
                    <h6 class="mb-1" style="text-align: left;">{{ $item['name'] }}</h6>
                    <p class="text-muted mb-1" style="text-align: left; font-size: 0.9rem;">{{ $item['publisher'] }}</p>
                    <span class="fw-bold d-block" style="text-align: left; margin-top: 5px;">
                    @php
                        $hasDiscount = isset($item['discounted_price']) && $item['discounted_price'] < $item['price'];
                    @endphp

                        @if(app()->getLocale() == 'en')
                            @if($item['price'] == 0)
                                Free to Play
                            @else
                                @if($hasDiscount)
                                    <span class="text-muted text-decoration-line-through">£{{ number_format($item['price'] * 0.84, 2) }}</span>
                                    <span class="text-danger ms-2">£{{ number_format($item['discounted_price'] * 0.84, 2) }}</span>
                                @else
                                    £{{ number_format($item['price'] * 0.84, 2) }}
                                @endif
                            @endif
                        @elseif(app()->getLocale() == 'pt')
                            @if($item['price'] == 0)
                                Gratuito
                            @else
                                @if($hasDiscount)
                                    <span class="text-muted text-decoration-line-through">€{{ number_format($item['price'], 2) }}</span>
                                    <span class="text-danger ms-2">€{{ number_format($item['discounted_price'], 2) }}</span>
                                @else
                                    €{{ number_format($item['price'], 2) }}
                                @endif
                            @endif
                        @endif
                    </span>

                </div>

                <!-- Botão para remover do carrinho -->
                <form action="{{ route('cart.remove', ['id_game' => $id_game]) }}" method="POST" class="ms-3 mr-3">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-link text-danger p-0" title="Remove from cart">
                        <i class="fa-solid fa-trash-can" style="font-size: 1.2rem;"></i>
                    </button>
                </form>
            </div>
        @empty
            <p>{{ __('messages.cart_empty_message') }}</p>
        @endforelse
    </div>
    <div class="mt-auto text-center">
        @if(auth()->check())
            <a href="{{ route('cart.checkout') }}"
               class="btn btn-success d-inline-flex align-items-center justify-content-center mb-3"
               style="width: 95%; max-width: 370px;">
                <i class="fa-solid fa-cart-shopping me-2"></i> {{ __('messages.checkout_button') }}
            </a>
        @else
            <a href="{{ route('login') }}"
               class="btn btn-warning d-inline-flex align-items-center justify-content-center mb-3"
               style="width: 95%; max-width: 370px;">
                <i class="fa-solid fa-sign-in-alt me-2"></i> {{ __('messages.login_to_checkout') }}
            </a>
        @endif
    </div>

</div>
