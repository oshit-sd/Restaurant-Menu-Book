@extends('BackEnd.adminMaster')
@section('dietary', 'active')
@section('content')

    <form id="Form" method="POST"  action="#" class="form-horizontal InsertForm">
    {{csrf_field()}}


    <!-- Request Url -->
        <input type="hidden" id="Url" value="/dietary">

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
                <label class="control-label col-lg-3">Icon <span class="text-danger">*</span></label>
                <div class="col-lg-8">
                    <input type="file" name="fld_image" required class="form-control">
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
                <th> Name</th>
                <th>Icon / Image</th>
                <th class="text-center">Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php $s=1; ?>
            @if ($getData)
                @foreach ($getData as $data)

                    <tr>
                        <td>{{ $s++ }}</td>
                        <td style="width: 30%;">{{ $data->fld_name }}</td>
                        <td style="width: 20%;">
                            <img src="{{ asset('upload_file/dieatary/'.$data->fld_icon_image) }}" style="height: 30px; width: 30px;">
                        </td>

                        <td class="text-center">

                            <ul class="icons-list">
                                <li class="text-primary-600">
                                    <a href="{{ url('/dietary/'.$data->id.'/edit') }}" class="linka fancybox fancybox.ajax labelSize2 btn btn-primary" data-popup="tooltip" title data-original-title="Edit_Data"><i class="icon-pencil7"></i></a>
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
