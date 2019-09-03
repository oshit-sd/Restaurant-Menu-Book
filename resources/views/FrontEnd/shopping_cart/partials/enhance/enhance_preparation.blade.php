<?php
$preparationArr = $cart->options->preparation;

if (!empty($cartQty)) :
    $cartQty = $cartQty;
else :
    $cartQty = $i;
endif;
?>

<div style="width: 100%; float: left;">
    <!-- Preparation -->
    @if(!is_null($preparationArr) && !empty($preparationArr))
    <div style="width: 100%; background: #d8e6d5; font-size: 12px;">
        <b style="padding: 5px;">Preparation</b>
    </div>

    @foreach($preparationArr[$cartQty] as $key1 => $preparationGroup)

    <?php $groupName =  App\Model\Preparation\PreparationGroup::getGroupName($key1); ?>
    <div class="headName">
        <!-- <b> $groupName </b><br> -->

        @foreach($preparationArr[$cartQty][$key1] as $key2 => $preName)
        <?php $name =  App\Model\Preparation\Preparation::getName($preName); ?>
        {{ $name."," }}

        @endforeach

    </div>
    @endforeach @endif
</div>