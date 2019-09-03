@if(!$details->OrderCondiments->isEmpty())
<?php
$condimentID    = App\Model\Order\OrderCondiments::getCondimentsID($keyQty, $details->id);
$condimentsName = App\Model\Condiment\Condiments::getName($condimentID);
?>
@if(!empty($condimentsName))
<tr>
    <td colspan="5" class="removeBorderPadding">
        <b>Condiments: </b>
        {{ $condimentsName."," }}
    </td>
</tr>
@endif
@endif