<div class="grid">
    <div class="product-pic">
        <a href="{{ route('productdetails', $relatedproducts->id) }}">
            <img src="{{ asset('uploads/thumbnail') }}/{{ $relatedproducts->thumbnail }}"
            alt>
        </a>
        

    </div>
    <div class="details">
        <h4><a href="{{ route('productdetails', $relatedproducts->id) }}">
                {{ $relatedproducts->name }} </a></h4>
        <p><a href="#"> {{ $relatedproducts->short_description }} </a></p>
        <div class="rating">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
        </div>
        <span class="price">
            <ins>
                <span class="woocommerce-Price-amount amount">
                    @if ($relatedproducts->discounted_price)
                        <span> ${{ $relatedproducts->discounted_price }} </span>
                        <del>${{ $relatedproducts->mrp }}</del>
                    @else
                        <span> {{ $relatedproducts->mrp }} </span>
                    @endif
                </span>
            </ins>
        </span>
        <div class="add-cart-area">
            <a href="{{ route('productdetails', $relatedproducts->id) }}"
                class="btn btn-info">Details</a>
        </div>
        <div class="add-cart-area">
            <button class="add-to-cart">Add to cart</button>
        </div>
    </div>
</div>