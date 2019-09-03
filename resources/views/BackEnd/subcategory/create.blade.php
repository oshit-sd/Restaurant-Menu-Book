@extends('BackEnd.adminMaster')
@section('subcategory', 'active')
@section('content')

    <form id="Form" method="POST"  action="#" class="form-horizontal InsertForm">
    {{csrf_field()}}


    <!-- Request Url -->
        <input type="hidden" id="Url" value="/subcategory">

        <div class="col-lg-2"></div>
        <div class="col-lg-7">

            <!-- Form Input Field -->
            <div class="form-group">
                <label class="control-label col-lg-3">Category <span class="text-danger">*</span></label>
                <div class="col-lg-8">
                    <select name="fld_category_id[]" data-placeholder="Select Category..." multiple="multiple" class="select">
                        @foreach($getCategory as $Cate)
                            <option value="{{$Cate->id}}">{{$Cate->fld_category}}</option>
                        @endforeach
                    </select>
                </div>
            </div>


            <!-- Form Input Field -->
            <div class="form-group">
                <label class="control-label col-lg-3">Sub-Cateogry <span class="text-danger">*</span></label>
                <div class="col-lg-8">
                    <input type="text" name="fld_subcategory" required placeholder="Sub-Cateogry Name" class="form-control">
                </div>
            </div>


            <!-- Form Input Field -->
            <div class="form-group">
                <label class="control-label col-lg-3">Front Size <span class="text-danger"></span></label>
                <div class="col-lg-8">
                    <input type="text" name="fld_front_size" value="14" placeholder="Front Size" class="form-control">
                </div>
            </div>


            <!-- Form Input Field -->
            <div class="form-group">
                <label class="control-label col-lg-3">Bold <span class="text-danger"></span></label>
                <div class="col-lg-8">
                    <input type="radio" value="Yes" name="fld_bold"> Yes &nbsp;&nbsp;&nbsp;
                    <input type="radio" name="fld_bold" value="No" checked> No
                </div>
            </div>


            <div class="text-center"  style="margin-top: 15px;">
                <button type="reset" class="btn btn-default" id="reset">Reset <i class="icon-reload-alt position-right"></i></button> &nbsp;
                <button type="submit" class="btn btn-primary">Submit <i class="icon-arrow-right14 position-right"></i></button>
            </div>
        </div>

    </form>
    </div>
    </div>



    <!--============== List of data ==============-->
    <!--============== List of data ==============-->
    <div class="panel panel-flat" style="margin-top: 0px;">
        <!-- Form validation -->
        <table class="table table-bordered table-hover datatable-highlight">
            <thead>
            <tr>
                <th>SL</th>
                <th>Category Name</th>
                <th>Sub-Category Name</th>
                <th>Size</th>
                <th>Bold</th>
                <th class="text-center">Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php $s=1; ?>
            @if ($getData)
                @foreach ($getData as $data)

                    <tr>
                        <td style="width: 5%;">{{ $s++ }}</td>
                        <td style="width: 30%;">
                            @foreach($data->categories as $category)
                                <label class="bg-teal" style="padding: 0px 10px;">
                                    {{ $category->fld_category }}
                                </label>
                            @endforeach
                        </td>
                        <td style="width: 15%;">{{ $data->fld_subcategory }}</td>
                        <td style="width: 5%;">{{ $data->fld_front_size }}</td>
                        <td style="width: 5%;">{{ $data->fld_bold }}</td>

                        <td class="text-center" style="width: 10%;">

                            <ul class="icons-list">
                                <li class="text-primary-600">
                                    <a href="{{ url('/subcategory/'.$data->id.'/edit') }}" class="labelSize2 btn btn-primary" data-popup="tooltip" title data-original-title="Edit_Data"><i class="icon-pencil7"></i></a>
                                </li>
                                <li class="text-danger-600">
                                    <form method="delete" id="deleteForm">
                                        {{ csrf_field() }}
                                        <a class="labelSize3 btn btn-danger" onclick="deleteData(<?php echo $data->id ?>)"  data-popup="tooltip" title data-original-title="Delete_Data"><i class="icon-trash"></i></a>
                                    </form>
                                </li>
                            </ul>

                        </td>
                    </tr>

                @endforeach @endif

            </tbody>
        </table>

    </div>
    </div>
    <!-- /main page sources -->
    </div>
    </div>
@endsection
