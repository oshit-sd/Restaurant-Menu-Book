<tr>
    <td colspan="5" class="removeBorderPadding">
        <b>Preparation: </b>
        @foreach($preparationArr as $preName)
        <?php $preparationName =  App\Model\Preparation\Preparation::getName($preName); ?>
        {{ $preparationName."," }}
        @endforeach
    </td>
</tr>