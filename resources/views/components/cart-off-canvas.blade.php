<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasCart" aria-labelledby="offcanvasCartLabel">
    <div class="offcanvas-header">
        <h5 id="offcanvasCartLabel">Your Cart</h5>
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
                    <span class="fw-bold d-block" style="text-align: left; margin-top: 5px;">€{{ number_format($item['price'], 2) }}</span>
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
            <p>Your cart is empty.</p>
        @endforelse
    </div>
    <div class="mt-auto text-center">
        <a {{-- href="{{ route('cart.checkout') }}" --}}
           class="btn btn-success d-inline-flex align-items-center justify-content-center mb-3"
           style="width: 95%; max-width: 370px;">
            <i class="fa-solid fa-cart-shopping me-2"></i> Checkout
        </a>
    </div>

</div>
