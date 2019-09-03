<!-- Preparation -->
@if(!is_null($preparationArr) && !empty($preparationArr))
<div style="width: 100%; background: #d8e6d5; font-size: 12px;">
    <b style="padding: 5px;">Preparation</b>
</div>

@foreach($preParation as $key5 => $preparationGroup)

<?php $groupName =  App\Model\Preparation\PreparationGroup::getGroupName($key5); ?>
<div class="headName">
    <!-- <b> $groupName </b><br> -->

    @foreach($preParation[$key5] as $key6 => $preName)
    <?php $name =  App\Model\Preparation\Preparation::getName($preName); ?>
    {{ $name."," }}

    @endforeach
</div>
@endforeach @endif