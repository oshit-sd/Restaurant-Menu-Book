<div class="product-layout product-list col-xs-12">
    <div class="product-thumb">
        <div class="image product-imageblock">
            <a href="{{url('single-item/'.$item->id)}}" class="linka fancybox fancybox.ajax">
                @if(isset($item->fld_image))
                <img src="{{ asset('upload_file/menu_items/'.$item->fld_image) }}" class="img-responsive" alt="food" title="{{$item->fld_name}}">
                @else
                <img src="{{ asset('upload_file/noImage.png/') }}" class="img-responsive" alt="food" title="{{$item->fld_name}}">
                @endif
            </a>

            <p class="price product-price prices">
                {{ $currency }}{{ $item->fld_price }}
                <span style="font-style: italic; color: #424242; font-size: 13px; font-weight: normal;">
                    {{ $item->fld_price_type }}
                </span>
            </p>

        </div>

        <div class="caption product-detail">
            <h4 class="product-name">
                <a href="#" title="{{$item->fld_name}}">
                    {{$item->fld_name}}
                </a>
                <span style="float: right;">
                    <a href="{{url('single-item/'.$item->id)}}" class="linka fancybox fancybox.ajax">
                        <img src="{{ asset('assets/FrontEnd/image/icon/info.png')}}" alt="info" class="info">
                    </a>
                </span>
            </h4>

            <p class="product-desc"> {{substr($item->fld_description, 0,209)}}..</p>

            <!-- Chilli & Dietaries-->
            <div class="button-group chilliDietaries">
                <div class=" chilli">
                    @if(isset($item->SpiceLevel->fld_chili_icon))
                    <img src="{{ asset('upload_file/spice_level/'.$item->SpiceLevel->fld_chili_icon)}}" class="vegetarian">
                    @endif

                    @if(!empty($item->dietaries))
                    @foreach($item->dietaries as $dietary)
                    <img src="{{ asset('upload_file/dieatary/'.$dietary->fld_icon_image)}}" class="vegetarian">
                    @endforeach
                    @endif
                </div>
            </div>

        </div>


        <!-- Button in add to cart or remove to cart -->
        <div class="button-group qtyPortion" style="float: right;">
            @if(
            !empty($withID) || !empty($withoutID) ||
            !empty($extraID) || !empty($messageID) ||
            !empty($preparationID) || !empty($condimentsID)
            )
            <a class="linka fancybox fancybox.ajax qtyRemove" href="{{ url('singleItemQtyPage/'.$rowID) }}">
                <i class="fa fa-minus"></i>
            </a>

            @else
            <button type="button" class="wishlist remove-to-cart" rowID="{{ $rowID }}" portion="Home">
                <i class="fa fa-minus"></i>
            </button>
            @endif

            <input type="text" value="{{ $qty }}" class="QtyInput QtyInput_{{ $item->id }} cartQty_{{ $rowID }}" readonly>

            @if(!$item->condiments_group->isEmpty())
            @php $cond = 1; @endphp
            @else
            @php $cond = 0; @endphp
            @endif

            <!-- Check item preparation -->
            @if(!$item->preparation_group->isEmpty())
            <a class="linka fancybox fancybox.ajax qtyRemove" href="{{url('popupPreparation/'.$qty.'/'.$item->id.'/'.$categoryID.'/'.$cond)}}">
                <i class="fa fa-plus"></i>
            </a>

            <!-- Check item condiments -->
            @elseif($cond == 1)
            <a class="linka fancybox fancybox.ajax qtyRemove" href="{{url('popupCondiments/'.$item->id.'/'.$categoryID)}}">
                <i class="fa fa-plus"></i>
            </a>

            <!-- Direct add to cart -->
            @else
            <button type="button" class="compare add-to-cart" menuID="{{ $item->id }}" rowID="{{ $rowID }}" portion="Home">
                <i class="fa fa-plus"></i>
            </button>
            @endif

        </div>


        <!-- item enhancement -->
        <div class="button-group" style="float: right;">
            @if($qty > 0)
            <a href="{{url('itemEnhancement/'.$rowID.'/1')}}" class="linka fancybox fancybox.ajax">
                <i class="fa fa-pencil enhancement" aria-hidden="true"></i>
            </a>
            @endif
        </div>

    </div>
</div>