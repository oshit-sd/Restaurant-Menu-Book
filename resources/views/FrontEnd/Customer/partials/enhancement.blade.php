<!-- With enhance -->
@if(!empty($orderIngredientArr['ingredientArr'][1][$keyQty]))
<tr>
    <td colspan="5" class="removeBorderPadding"><b>With: </b>
        @foreach($orderIngredientArr['ingredientArr'][1][$keyQty] as $withName)

        <?php $with =  App\Model\Ingredient\Ingredient::getName($withName); ?>
        {{ $with."," }}

        @endforeach
    </td>
</tr>
@endif

<!-- Without enhance -->
@if(!empty($orderIngredientArr['ingredientArr'][2][$keyQty]))
<tr>
    <td colspan="5" class="removeBorderPadding"><b>Without: </b>
        @foreach($orderIngredientArr['ingredientArr'][2][$keyQty] as $withoutName)

        <?php $without =  App\Model\Ingredient\Ingredient::getName($withoutName); ?>
        {{ $without."," }}

        @endforeach
    </td>
</tr>
@endif

<!-- extra enhance -->
@if(!empty($orderIngredientArr['ingredientArr'][3][$keyQty]))
<tr>
    <td colspan="5" class="removeBorderPadding"><b>Extra: </b>
        @foreach($orderIngredientArr['ingredientArr'][3][$keyQty] as $extraName)

        <?php $extra =  App\Model\Ingredient\Ingredient::getName($extraName); ?>
        {{ $extra."," }}

        @endforeach
    </td>
</tr>
@endif

<!-- message enhance -->
@if(!empty($qtyMessage))
<tr>
    <td colspan="5" class="removeBorderPadding"><b>Message: </b>
        {{ $qtyMessage }}
    </td>
</tr>
@endif