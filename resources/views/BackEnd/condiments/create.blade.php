@extends('BackEnd.adminMaster')
@section('condiments', 'active')
@section('content')

    <form id="Form" method="POST"  action="#" class="form-horizontal InsertForm">
    {{csrf_field()}}


    <!-- Request Url -->
        <input type="hidden" id="Url" value="/condiments">

        <div class="col-lg-2"></div>
        <div class="col-lg-7">


            <!-- Form Input Field -->
            <div class="form-group">
                <label class="control-label col-lg-3">Condiments Name <span class="text-danger">*</span></label>
                <div class="col-lg-8">
                    <input type="text" name="fld_condiment_name" required placeholder="Condiments Name" class="form-control">
                </div>
            </div>


            <!-- Form Input Field -->
            <div class="form-group">
                <label class="control-label col-lg-3">Price <span class="text-danger"></span></label>
                <div class="col-lg-8">
                    <input type="text" name="fld_price" placeholder="Price" class="form-control">

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
                <th>Condiments Name</th>
                <th>Price</th>
                <th class="text-center">Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php $s=1; ?>
            @if ($getData)
                @foreach ($getData as $data)

                    <tr>
                        <td style="width: 5%;">{{ $s++ }}</td>
                        <td style="width: 40%;">{{ $data->fld_condiment_name }}</td>
                        <td style="width: 20%;">{{ $data->fld_price }}</td>
                        <td class="text-center"  style="width: 20%;">

                            <ul class="icons-list">
                                <li class="text-primary-600">
                                    <a href="{{ url('/condiments/'.$data->id.'/edit') }}" class="linka fancybox fancybox.ajax labelSize2 btn btn-primary" data-popup="tooltip" title data-original-title="Edit_Data"><i class="icon-pencil7"></i></a>
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
