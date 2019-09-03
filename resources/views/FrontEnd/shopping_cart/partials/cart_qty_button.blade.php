<div class="button-group qtyPortion">

    @if(
    !is_null($cart->options->with_id) ||
    !is_null($cart->options->without_id) ||
    !is_null($cart->options->extra_id) ||
    !is_null($cart->options->message)||
    !is_null($cart->options->preparation)||
    !is_null($cart->options->condiments)
    )

    <button type="button" class="cl_button qty-page" rowID="{{ $cart->rowId }}">
        <i class="fa fa-minus"></i>
    </button>
    @else

    <button type="button" class="cl_button remove-to-cart" rowID="{{ $cart->rowId }}" portion="cartList">
        <i class="fa fa-minus"></i>
    </button>
    @endif

    <input type="hidden" value="CartList" class="cartPortion">
    <input type="text" id="qty_input" value="{{ $qty }}" min="1" class="QtyInput itemQty_{{ $cart->rowId }} itemQty2_{{ $cart->id }}" readonly>

    <!-- Plus Button -->
    <button type="button" class="cl_plusBtn cl_button add-to-cart" menuID="{{ $cart->id }}" portion="cartList">
        <i class="fa fa-plus"></i>
    </button>
</div>

<!-- Item Price -->
<b>{{ $currency }}{{$cart->price}}</b>
<span style="font-style: italic; color: #424242; font-size: 13px; font-weight: normal;">
    {{ $Item->fld_price_type }}
</span>