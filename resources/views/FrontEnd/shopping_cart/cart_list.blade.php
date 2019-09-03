<div class="carList">

    <!-- Header Section -->
    <div style="width: 97%;">
        <h3><b><i class="fa fa-cart-plus"></i> {{isset($title)?$title:""}}</b></h3>
        <hr>
    </div>

    <!-- Body Section  -->
    <div style="width: 100%;">

        @php $qty = $ehQty = 0; $cartQty = 0; @endphp
        @if(count($cartContent) > 0)

        @php $preparationNameArr = []; @endphp

        @foreach ($category as $cate)

        @php $categoryCount = 0; @endphp

        @foreach ($cartContent as $cart)
        @if($cate->id == $cart->options->category)

        <?php
        $preparationArr = $cart->options->preparation;
        if (!is_null($preparationArr)) :
            $uniquePreparation = array_map("unserialize", array_unique(array_map("serialize", $preparationArr)));
        else :
            $uniquePreparation = "";
        endif;
        ?>

        @if($categoryCount == 0)
        <div class="cl_categoryN">
            <i class="fa fa-angle-double-right"></i> {{$cate->fld_category}}
        </div>
        @endif

        <div class="cartContent">

            <?php
            $Item       = App\Model\Menuitem\Menuitems::find($cart->id);
            $count      = 0;
            $cartQty    = 0;
            ?>
            @for($i=1; $i<=$cart->qty; $i++)
                @php $ii=0; $cartQty++; @endphp

                <!-- check cart enhancement exist  -->
                <!-- check cart enhancement exist  -->
                @if( !is_null($cart->options->with_id) )
                @if( array_key_exists($i, $cart->options->with_id) )
                @php $ii++; @endphp @endif @endif

                @if( !is_null($cart->options->without_id) )
                @if( array_key_exists($i, $cart->options->without_id) )
                @php $ii++; @endphp @endif @endif

                @if( !is_null($cart->options->extra_id) )
                @if( array_key_exists($i, $cart->options->extra_id) )
                @php $ii++; @endphp @endif @endif

                @if( !is_null($cart->options->message))
                @if( array_key_exists($i, $cart->options->message) )
                @php $ii++; @endphp @endif @endif


                <!-- This item is included in Enhancement -->
                <!-- This item is included in Enhancement -->
                @if($ii>0)
                @php $qty = $ehQty = 1; @endphp

                <!-- count qty  -->
                <?php $count++; ?>

                <div class="cl_fullContent">
                    <div class="cl_leftContent">
                        <!-- Cart Qty Button -->
                        @include('FrontEnd.shopping_cart.partials.cart_qty_button')
                    </div>

                    <div class="cl_rightContent">
                        <div style="width:80%;float: left; font-size: 16px;">
                            <b>{{ $cart->name}}</b>

                            <a class="enhancement-page" rowID="{{ $cart->rowId }}" style="color:#0f78b5; margin-left: 10px; font-size: 10px; cursor: pointer;" data-popup="tooltip">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                            </a>
                        </div>

                        <div class="price" style="float: right">
                            <b>${{ number_format( (float)$cart->price , 2)}}</b>
                        </div>
                        <!-- Cart Enhancement -->
                        <div style="width:100%; float: left;">
                            @include('FrontEnd.shopping_cart.partials.enhancement')
                        </div>

                        <!-- Preparation & Condiments -->
                        <div style="width:100%; float: left; margin-top: 5px;">
                            @include('FrontEnd.shopping_cart.partials.enhance.enhance_preparation')
                            @include('FrontEnd.shopping_cart.partials.condiments')
                        </div>

                    </div>
                </div>

                @endif



                <!-- This item is not included in Enhancement   -->
                <!-- This item is not included in Enhancement   -->
                @if($i == $cart->qty)
                @if(!empty($uniquePreparation))
                @foreach($uniquePreparation as $preParation)

                <?php
                // common preparation merge===========
                $qty = App\Model\Preparation\PreparationGroup::mergePreparation($cart->id, $preparationArr, $preParation);
                ?>

                @if($qty>0)
                <div class="cl_fullContent">
                    <div class="cl_leftContent">
                        {{-- Cart Qty Button  --}}
                        @include('FrontEnd.shopping_cart.partials.cart_qty_button')
                    </div>


                    <div class="cl_rightContent">
                        <div style="width:80%;float: left; font-size: 16px;">
                            <b>{{$cart->name}}</b>
                        </div>
                        <div class="price" style="float: right">
                            <b>${{ number_format((float)($cart->price*$qty),2)}}</b>
                        </div>

                        <!-- Preparation & Condiments -->
                        <div style="width:100%; float: left; margin-top: 5px;">
                            @include('FrontEnd.shopping_cart.partials.preparation')
                            @include('FrontEnd.shopping_cart.partials.condiments')
                        </div>

                    </div>
                </div>
                @endif

                @endforeach
                @else

                @php
                $qty = $i - $ehQty;
                @endphp
                <div class="cl_fullContent">
                    <div class="cl_leftContent">
                        <!-- Cart Qty Button  -->
                        @include('FrontEnd.shopping_cart.partials.cart_qty_button')
                    </div>

                    <div class="cl_rightContent">
                        <div style="width:80%;float: left; font-size: 16px;">
                            <b>{{$cart->name}}</b>
                        </div>
                        <div class="price" style="float: right">
                            <b>${{ number_format((float)($cart->price*$qty),2)}}</b>
                        </div>

                    </div>
                </div>

                @endif @endif @endfor

        </div>
        <!-- /.food-item -->
        @php $categoryCount++; @endphp
        @endif @endforeach @endforeach


        <!-- Sub Total -->
        <div class="cl_subtotal">
            <b>Total : ${{Cart::subtotal()}}</b>
            <input type="hidden" value="{{Cart::subtotal()}}" id="cartlistSubtotal">
            <input type="hidden" value="{{Cart::count()}}" id="cartlistTotalQty">
        </div>

        <!-- Confirm Button  -->
        <div class="cl_confirmButton">
            <center>
                <a class="btn btn-success btn-block confirm-order">
                    CONFIRM ORDER
                </a>
            </center>
        </div>

        @else
        <div class="alert alert-danger" style="font-size: 17px; width: 97%;">
            <strong>Sorry!!</strong> Your cart is empty.
        </div>
        @endif
    </div>

    <!-- Shopping Cart Js -->
    <script src="{{ asset('assets/FrontEnd/js/shopping_cart.js') }}"></script>
</div>