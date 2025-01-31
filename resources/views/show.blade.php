<x-app-layout>
    <section class="py-5">
        <div class="container my-5">
            <div class="row">
                <!-- Product Images -->
                <div class="col-md-6 mb-4">
                    <img src="{{ asset($product->image) }}" alt="Product" class="img-fluid rounded mb-3 product-image"
                        id="mainImage">
                </div>

                <!-- Product Details -->
                <div class="col-md-6">
                    <h2 class="mb-3">{{ $product->title }}</h2>
                    <p class="text-muted mb-4">SKU: WH1000XM4</p>
                    <div class="mb-3">
                        <span class="h4 me-2">Rp.{{ $product->price }}</span>
                    </div>
                    <div class="mb-3">
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-half text-warning"></i>
                        <span class="ms-2">4.5 (120 reviews)</span>
                    </div>
                    <p class="mb-4">{{ $product->description }}</p>
                    <div class="mb-4">
                        <h5>Color:</h5>
                        <div class="btn-group" role="group" aria-label="Color selection">
                            <input type="radio" class="btn-check" name="color" id="black" autocomplete="off"
                                checked>
                            <label class="btn btn-outline-dark" for="black">{{ $product->color }}</label>
                        </div>
                    </div>
                    <button class="btn btn-primary btn-lg mb-3 me-2">
                        <i class="bi bi-cart-plus"></i> Beli Sekarang
                    </button>
                    <button class="btn btn-outline-secondary btn-lg mb-3">
                        <i class="bi bi-heart"></i> Add to Wishlist
                    </button>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
