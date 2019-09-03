@extends('BackEnd.adminMaster')
@section('TableOTime', 'active')
@section('content')

    @if($count == 0)
        <form id="Form" method="POST"  action="#" class="form-horizontal InsertForm">
            @elseif($count == 1)
                <form id="updateForm" class="form-horizontal form-validate-jquery" method="patch">
                    <input type="hidden" name="id" id="idd" value="{{ $data->id }}">
            @endif
                    {{csrf_field()}}

                    <!-- Request Url -->
                        <input type="hidden" id="Url" value="/TableOTime">
                    <div class="col-lg-3"></div>
                    <div class="col-lg-6">

                        <!-- Form Input Field -->
                        <div class="form-group">
                            <label class="control-label col-lg-3">Time <span class="text-danger"></span></label>
                            <div class="col-lg-8">
                                <input type="text" name="fld_time" value="{{isset($data->fld_time)?date('H:i',strtotime($data->fld_time)):date('H:i')}}" required placeholder="Restaurant Name" class="form-control">
                                <span style="color: #d20000; font-size: 12px;"><b>Note: ( Hours:Minutes )</b></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-lg-3"></div>
                            <div class="col-lg-5">
                                @if($count == 0)
                                    <button type="submit" class="btn btn-primary">Submit <i class="icon-arrow-right14 position-right"></i></button>
                                @elseif($count == 1)
                                    <button type="button" id="UpdateData" class="btn btn-success">Update <i class="icon-arrow-right14 position-right"></i></button>
                                @endif
                            </div>
                            <div class="col-lg-2">
                                @if(isset($data->fld_logo))
                                    <img src="{{ asset('upload_file/logo/'.$data->fld_logo) }}" style="height: 80px; width: 80px; margin-left: 25px;">
                                @endif
                            </div>
                        </div>

                    </div>
                </form>


                </div>
                </div>

                <!-- /main page sources -->
                </div>
                </div>
                </div>
@endsection
