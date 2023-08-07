<div class="product">
    <div class="product-img">
        <img src="{{ asset($imagelink) }}" alt="" />
    </div>
    <div class="product-desc">
        <h3 class="product-name">{{ $name }}</h3>
        <p class="product-sale">
            ${{ round($price - ($price / 100) * $sale, 2) }} <span
                class="product-price">{{ $sale == 0 ? '' : "$$price" }}</span>
        </p>
        <div class="product-rate">
            <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
        </div>
    </div>
    <a href="{{ route('product-details', ['id' => $id]) }}" class="product-info"><i class="fa-regular fa-eye"></i></a>
    <div class="product-add">
        <form action="{{ route('cart.add') }}" data-id="{{$id}}" class="form-submit" method="post">
            <input class="item-count" type="hidden" id="product-{{$id}}" name="quantity" value="1" min="1">
            <input type="hidden" name="id" value="{{ $id }}">
            <input type="hidden" name="add" value="1">
            @csrf
            <button type="submit"><i class="fa-solid fa-plus"></i></button>
        </form>
    </div>
</div>
