<?php
$condimentsArr = $cart->options->condiments;

if (!empty($cartQty)) :
    $cartQty = $cartQty;
else :
    $cartQty = $i;
endif;
?>

<div style="width: 100%; float: left;">
    <!-- Condiments -->
    @if(!is_null($condimentsArr) && !empty($condimentsArr))
    <div style="width: 100%; background: #d8e6d5; font-size: 12px;">
        <b style="padding: 5px;">Condiments</b>
    </div>

    @foreach($condimentsArr[$cartQty] as $key1 => $condimentsGroup)
    <?php $groupName2 =  App\Model\Condiment\CondimentsGroup::getGroupName($key1); ?>
    <div class="headName">
        <!-- <b> $groupName2 </b><br> -->

        @foreach($condimentsArr[$cartQty][$key1] as $key2 => $preName)
        <?php $name2 =  App\Model\Condiment\Condiments::getName($preName); ?>
        {{ $name2."," }}

        @endforeach
    </div>
    @endforeach @endif
</div>