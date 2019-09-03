<div class="tab-1 tab-content current">
    @if($Item->ingredient_with)

    <!-- Group name -->
    @foreach ($Item->ingredient_with as $with)

    <b>{{$with->fld_name}}</b>
    <hr>

    <!-- cart ingredient_with nam -->
    @if(($cart->options->with_id))
    @if(array_key_exists($active_qty, $cart->options->with_id) &&
    isset($cart->options->with_id[$active_qty][$with->id]))
    @foreach ($with->ingredient as $ingrdWith)

    <label class="container-checkbox"> {{$ingrdWith->fld_name}}
        <!-- name="with_id[Qty][group_id][ingredient_name] -->
        <input type="checkbox" @if(in_array( $ingrdWith->id,
        $cart->options->with_id[$active_qty][$with->id])) checked @endif
        name="with_id[{{$active_qty}}][{{$with->id}}][]" value="{{$ingrdWith->id}}">
        <span class="checkmark"></span>
    </label>

    @endforeach

    @else
    <!-- without cart ingredient_with name -->
    @foreach ($with->ingredient as $ingrdWith2)
    <label class="container-checkbox"> {{$ingrdWith2->fld_name}}
        <input type="checkbox" name="with_id[{{$active_qty}}][{{$with->id}}][]" value="{{$ingrdWith2->id}}">
        <span class="checkmark"></span>
    </label>
    @endforeach
    @endif


    @else
    <!-- without cart ingredient_with name -->
    @foreach ($with->ingredient as $ingrdWith2)
    <label class="container-checkbox"> {{$ingrdWith2->fld_name}}
        <input type="checkbox" name="with_id[{{$active_qty}}][{{$with->id}}][]" value="{{$ingrdWith2->id}}">
        <span class="checkmark"></span>
    </label>
    @endforeach

    @endif
    <hr>
    @endforeach

    @endif
</div>