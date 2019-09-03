<div class="tab-3 tab-content">
    @if($Item->ingredien_extras)
    <!-- Group name -->
    @foreach ($Item->ingredien_extras as $extra)
    <b>{{$extra->fld_name}}</b>

    <!-- cart ingredient_extra name -->
    @if(($cart->options->extra_id))
    @if(array_key_exists($active_qty, $cart->options->extra_id) &&
    isset($cart->options->extra_id[$active_qty][$extra->id]))
    @foreach ($extra->ingredient as $ingrdExtra)

    <label class="container-checkbox"> {{$ingrdExtra->fld_name}}
        <!-- name="extra_id[Qty][group_id][ingredient_name] -->
        <input type="checkbox" @if(in_array( $ingrdExtra->id,
        $cart->options->extra_id[$active_qty][$extra->id])) checked @endif
        name="extra_id[{{$active_qty}}][{{$extra->id}}][]" value="{{$ingrdExtra->id}}">
        <span class="checkmark"></span>
    </label>

    @endforeach


    @else
    <!-- without cart ingredient_extra name -->
    @foreach ($extra->ingredient as $ingrdExtra2)
    <label class="container-checkbox"> {{$ingrdExtra2->fld_name}}
        <input type="checkbox" name="extra_id[{{$active_qty}}][{{$extra->id}}][]" value="{{$ingrdExtra2->id}}">
        <span class="checkmark"></span>
    </label>
    @endforeach
    @endif


    @else
    <!-- without cart ingredient_extra name -->
    @foreach ($extra->ingredient as $ingrdExtra2)
    <label class="container-checkbox"> {{$ingrdExtra2->fld_name}}
        <input type="checkbox" name="extra_id[{{$active_qty}}][{{$extra->id}}][]" value="{{$ingrdExtra2->id}}">
        <span class="checkmark"></span>
    </label>
    @endforeach
    @endif
    <hr>

    @endforeach
    @endif
</div>