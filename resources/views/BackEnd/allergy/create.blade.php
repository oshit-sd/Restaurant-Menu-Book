@extends('BackEnd.adminMaster')
@section('allergy', 'active')
@section('content')

<form id="Form" method="POST" action="#" class="form-horizontal InsertForm">
    @csrf


    <!-- Request Url -->
    <input type="hidden" id="Url" value="/allergy">

    <div class="col-lg-2"></div>
    <div class="col-lg-7">

        <!-- Form Input Field -->
        <div class="form-group">
            <label class="control-label col-lg-3">Allergy Name <span class="text-danger">*</span></label>
            <div class="col-lg-8">
                <input type="text" name="fld_name" required placeholder="Allergy  Name" class="form-control">
            </div>
        </div>

        <!-- Form Input Field -->
        <div class="form-group">
            <label class="control-label col-lg-3">Description </label>
            <div class="col-lg-8">
                <textarea name="fld_description" placeholder="Description" class="form-control" rows="4"></textarea>
            </div>
        </div>


        <div class="text-center" style="margin-top: 15px;">
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
                <th>Allergy Name</th>
                <th>Description</th>
                <th class="text-center">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php $s = 1; ?>
            @if ($getData)
            @foreach ($getData as $data)

            <tr>
                <td style="width: 5%;">{{ $s++ }}</td>
                <td style="width: 25%;">{{ $data->fld_name }}</td>
                <td style="width: 40%;">{{ $data->fld_description }}</td>

                <td class="text-center" style="width: 10%;">

                    <ul class="icons-list">
                        <li class="text-primary-600">
                            <a href="{{ url('/allergy/'.$data->id.'/edit') }}" class="linka fancybox fancybox.ajax labelSize2 btn btn-primary" data-popup="tooltip" title data-original-title="Edit_Data"><i class="icon-pencil7"></i></a>
                        </li>
                        <li class="text-danger-600">
                            <form method="delete" id="deleteForm">
                                {{ csrf_field() }}
                                <a class="labelSize3 btn btn-danger" onclick="deleteData(<?php echo $data->id ?>)" data-popup="tooltip" title data-original-title="Delete_Data"><i class="icon-trash"></i></a>
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