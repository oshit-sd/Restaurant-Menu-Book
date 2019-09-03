<div class="tab-2 tab-content">
    @if($Item->ingredient_without)
    <!-- Group name -->
    @foreach ($Item->ingredient_without as $without)

    <b>{{$without->fld_name}}</b>

    <!-- cart ingredient_without name -->
    @if(($cart->options->without_id))
    @if(array_key_exists($active_qty, $cart->options->without_id) &&
    isset($cart->options->without_id[$active_qty][$without->id]))
    @foreach ($without->ingredient as $ingrdWthout)

    <label class="container-checkbox"> {{$ingrdWthout->fld_name}}
        <!-- name="without_id[Qty][group_id][ingredient_name] -->
        <input type="checkbox" @if(in_array( $ingrdWthout->id,
        $cart->options->without_id[$active_qty][$without->id])) checked @endif
        name="without_id[{{$active_qty}}][{{$without->id}}][]" value="{{$ingrdWthout->id}}">
        <span class="checkmark"></span>
    </label>

    @endforeach

    @else
    <!-- without cart ingredient_without name -->
    @foreach ($without->ingredient as $ingrdWthout2)
    <label class="container-checkbox"> {{$ingrdWthout2->fld_name}}
        <input type="checkbox" name="without_id[{{$active_qty}}][{{$without->id}}][]" value="{{$ingrdWthout2->id}}">
        <span class="checkmark"></span>
    </label>
    @endforeach
    @endif

    @else
    <!-- without cart ingredient_without name -->
    @foreach ($without->ingredient as $ingrdWthout2)
    <label class="container-checkbox"> {{$ingrdWthout2->fld_name}}
        <input type="checkbox" name="without_id[{{$active_qty}}][{{$without->id}}][]" value="{{$ingrdWthout2->id}}">
        <span class="checkmark"></span>
    </label>
    @endforeach
    @endif
    <hr>

    @endforeach
    @endif
</div>