@extends('BackEnd.adminMaster')
@section('MealCourse', 'active')
@section('content')

    <form id="Form" method="POST"  action="#" class="form-horizontal InsertForm">
    {{csrf_field()}}


    <!-- Request Url -->
        <input type="hidden" id="Url" value="/MealCourse">

        <div class="col-lg-2"></div>
        <div class="col-lg-7">


            <!-- Form Input Field -->
            <div class="form-group">
                <label class="control-label col-lg-3">Name <span class="text-danger">*</span></label>
                <div class="col-lg-8">
                    <input type="text" name="fld_name" required placeholder="Name" class="form-control">
                </div>
            </div>


            <!-- Form Input Field -->
            <div class="form-group">
                <label class="control-label col-lg-3">Course Level <span class="text-danger"></span></label>
                <div class="col-lg-8">
                    <select name="fld_course_level" required class="form-control">
                        <option value="">Select Level</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                        <option>6</option>
                        <option>7</option>
                        <option>8</option>
                        <option>9</option>
                        <option>10</option>
                    </select>
                </div>
            </div>


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
                <th>Name</th>
                <th>Course Level</th>
                <th>Category</th>
                <th class="text-center">Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php $s=1; ?>
            @if ($getData)
                @foreach ($getData as $data)

                    <tr>
                        <td style="width: 5%;">{{ $s++ }}</td>
                        <td style="width: 25%;">{{ $data->fld_name }}</td>
                        <td style="width: 10%;">{{ $data->fld_course_level }}</td>
                        <td style="width: 30%;">
                            @foreach($data->categories as $category)
                                <label class="bg-teal" style="padding: 0px 10px;">
                                    {{ $category->fld_category }}
                                </label>
                            @endforeach
                        </td>

                        <td class="text-center"  style="width: 10%;">

                            <ul class="icons-list">
                                <li class="text-primary-600">
                                    <a href="{{ url('/MealCourse/'.$data->id.'/edit') }}" class="labelSize2 btn btn-primary" data-popup="tooltip" title data-original-title="Edit_Data"><i class="icon-pencil7"></i></a>
                                </li>
                                <li class="text-danger-600">
                                    <form method="delete" id="deleteForm">
                                        {{ csrf_field() }}
                                        <a class="labelSize3 btn btn-danger" onclick="deleteData({{$data->id }})"  data-popup="tooltip" title data-original-title="Delete_Data"><i class="icon-trash"></i></a>
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
