<div style="width:100%; float: left;">

    @if(!empty($active_qty))
    @php $active_qty = $active_qty; @endphp
    @else
    @php $active_qty = $i; @endphp
    @endif


    @if(($cart->options->with_id))
    @if(array_key_exists($active_qty, $cart->options->with_id))
    <div class="headName"><b>With :</b>
        @foreach ($Item->ingredient_with as $withName)
        @foreach ($withName->ingredient as $ingrdWithName)
        @if(in_array( $ingrdWithName->id, $cart->options->with_id[$active_qty][$withName->id]))
        {{$ingrdWithName->fld_name }},
        @endif
        @endforeach
        @endforeach
    </div>
    @endif
    @endif

    @if(($cart->options->without_id))
    @if(array_key_exists($active_qty, $cart->options->without_id))
    <div class="headName"><b>Without :</b>
        @foreach ($Item->ingredient_without as $withoutName)
        @foreach ($withoutName->ingredient as $ingrdWithoutName)
        @if(in_array( $ingrdWithoutName->id,
        $cart->options->without_id[$active_qty][$withoutName->id]))
        {{$ingrdWithoutName->fld_name }},
        @endif
        @endforeach
        @endforeach
    </div>
    @endif
    @endif

    @if(($cart->options->extra_id))
    @if(array_key_exists($active_qty, $cart->options->extra_id))
    <div class="headName"><b>Extra :</b>
        @foreach ($Item->ingredien_extras as $extraName)
        @foreach ($extraName->ingredient as $ingrdExtraName)
        @if(in_array( $ingrdExtraName->id,
        $cart->options->extra_id[$active_qty][$extraName->id]))
        {{$ingrdExtraName->fld_name }},
        @endif
        @endforeach
        @endforeach
    </div>
    @endif
    @endif

    @if($cart->options->message)
    @if(array_key_exists($active_qty, $cart->options->message))
    @if(!empty($cart->options->message[$active_qty]))
    <div class="headName"><b>Message :</b>
        {{$cart->options->message[$active_qty]}}
    </div>
    @endif
    @endif
    @endif

</div>