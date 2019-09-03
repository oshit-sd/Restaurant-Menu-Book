@if(!empty($category->subcategories))
@foreach($category->subcategories as $subCate)
@foreach($subCate->items as $data)

<tr>
    <td style="width: 10%;">{{ $data->fld_serial_numbr }}</td>
    <td style="width: 25%;">{{ $data->fld_name }}</td>
    <td style="width: 10%;">{{ $data->fld_price }}</td>
    <td style="width: 15%;">{{ $data->subCategory->fld_subcategory }}</td>
    <td style="width: 10%;">
        @if(isset($data->fld_image))
        <img src="{{ asset('upload_file/menu_items/'.$data->fld_image) }}" style="height: 50px; width: 80px;">
        @else
        <img src="{{ asset('upload_file/noImage.png/') }}" style="height: 50px; width: 80px;">
        @endif
    </td>

    <td class="text-center" style="width: 15%;">

        <ul class="icons-list">
            <li class="text-primary-600">
                <a href="{{ url('/menuitems/'.$data->id) }}" class="linka fancybox fancybox.ajax labelSize3 btn btn-success" data-popup="tooltip" title data-original-title="View_Data"><i class="icon-zoomin3"></i></a>
            </li>
            <li class="text-primary-600">
                <a href="{{ url('/menuitems/'.$data->id.'/edit') }}" class="labelSize2 btn btn-primary" data-popup="tooltip" title data-original-title="Edit_Data"><i class="icon-pencil7"></i></a>
            </li>
            <li class="text-danger-600">
                <form method="delete" id="deleteForm">
                    <!-- Request Url -->
                    <input type="hidden" id="Url" value="/menuitems">
                    {{ csrf_field() }}
                    <a class="labelSize3 btn btn-danger" onclick="deleteData(<?php echo $data->id ?>)" data-popup="tooltip" title data-original-title="Delete_Data"><i class="icon-trash"></i></a>
                </form>
            </li>
        </ul>

    </td>
</tr>

@endforeach @endforeach @endif