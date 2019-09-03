<tr style="background: #ececd1;">
    <td>
        {{ (isset($details->orderItem->fld_name)) ?
                            $details->orderItem->fld_name : '' }}
    </td>
    <td>
        {{ (isset($details->orderItem->subCategory->fld_subcategory)) ?
                            $details->orderItem->subCategory->fld_subcategory : '' }}
    </td>
    <td class="center">{{ $qty }}</td>
    <td class="right">{{ $details->price }}</td>
    <td class="right">{{ number_format((float)$subTotal,2) }}</td>
</tr>