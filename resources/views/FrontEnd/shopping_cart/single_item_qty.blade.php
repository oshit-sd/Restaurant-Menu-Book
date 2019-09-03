<div class="carList">

    {{-- Header Section --}}
    <div style="width: 97%;">
        <h3><b><i class="fa fa-cart-plus"></i> {{isset($title)?$title:""}}</b></h3>
        <hr>
    </div>

    <div class="cartContent">
        <div style="width: 100%;">

            <div style="width: 100%; height: auto; border-right: 1px solid #d3d3d3">

                @for($i=1; $i<=$cart->qty; $i++)
                    <div class="si_qtyDiv">
                        <a class="btn btn-success btn-sm si_enhanceQty enhanceQty_{{ $i }}" style="color: #28a745; background: #fff;">
                            Qty {{$i}}
                        </a>
                        <i class="fa fa-trash-o remove-qty" rowID="{{ $cart->rowId }}" qty="{{ $i }}" totalQty="{{ $cart->qty }}" aria-hidden="true"></i>

                        <!-- Cart Enhancement -->
                        @include('FrontEnd.shopping_cart.partials.enhancement')

                        <div style="height: 5px; border:1px solid #fff; float: left"></div>
                        @include('FrontEnd.shopping_cart.partials.enhance.enhance_preparation')
                        @include('FrontEnd.shopping_cart.partials.condiments')

                    </div>

                    @endfor

            </div>

        </div>
    </div>
</div>

<!-- Shopping Cart -->
<script src="{{ asset('assets/FrontEnd/js/shopping_cart.js') }}"></script>