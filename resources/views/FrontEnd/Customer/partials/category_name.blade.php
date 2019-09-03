@if(!in_array($details->category_id, $categoryArr))
<tr style="background: #ecb6b6;">
    <td class="center" colspan="5">
        <b>{{ $details->category->fld_category }}</b>
    </td>
</tr>
@endif