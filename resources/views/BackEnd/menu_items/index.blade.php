@extends('BackEnd.adminMaster')
@section('MenuitemList', 'active')
@section('content')

<!--============== List of data ==============-->
<!--============== List of data ==============-->
<div class="panel panel-flat" style="margin-top: 0px;">
    <div class="col-lg-1" style="margin: 5px; padding: 8px;">
        <b>Sorting: </b>
    </div>
    <div class="col-lg-3" style="margin: 5px;">
        <select name="category" onchange="getCategoryItem(this.value)" class="select">
            <option value=""> Category wise</option>

            @if($getCategory)
            @foreach($getCategory as $category)
            <option value="{{ $category->id }}">{{ $category->fld_category }}</option>
            @endforeach @endif
        </select>
    </div>

    <div class="col-lg-3" style="margin: 5px;">
        <select name="category" onchange="getSubCategoryItem(this.value)" class="select">
            <option value="">Sort Sub-category wise</option>

            @if($getSubcategory)
            @foreach($getSubcategory as $subcategory)
            <option value="{{ $subcategory->id }}">{{ $subcategory->fld_subcategory }}</option>
            @endforeach @endif
        </select>
    </div>

    <!-- Form validation -->
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>SL NO.</th>
                <th>Name</th>
                <th>Price</th>
                <th>Sub-category</th>
                <th>Image</th>
                <th class="text-center">Actions</th>
            </tr>
        </thead>
        <tbody class="result">
            @if ($getData)
            @foreach ($getData as $data)

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

            @endforeach

            <tr>
                <td colspan="6">
                    <!-- Pagination -->
                    {{ $getData->links() }}
                </td>
            <tr>

                @endif
        </tbody>
    </table>

</div>
</div>
</div>
</div>

<!-- Script Code -->
<script>
    function getCategoryItem(id) {
        if (id != "") {
            $.ajax({
                type: 'get',
                url: '/categoryWiseItem/' + id,
                dataType: "HTML",
                success: function(data) {
                    $('.result').html(data);
                }
            });
        }
    }

    function getSubCategoryItem(id) {
        if (id != "") {
            $.ajax({
                type: 'get',
                url: '/subCategoryWiseItem/' + id,
                dataType: "HTML",
                success: function(data) {
                    $('.result').html(data);
                }
            });
        }
    }
</script>

@endsection