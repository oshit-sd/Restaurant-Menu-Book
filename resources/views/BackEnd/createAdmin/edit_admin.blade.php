@extends('BackEnd.adminMaster')
@section('edit_admin', 'active')
@section('content')


    <form id="updateAdminForm" class="form-horizontal form-validate-jquery" method="patch">
        <input type="hidden" value="{{ csrf_token() }}" name="_token">
        {{ csrf_field() }}
        <input type="hidden" name="id" id="idd" value="{{ $editData->id }}">
        <input type="hidden" value="{{ Auth::user()->id }}" name="add_by">
        <div class="col-lg-3"></div>

        <div class="col-lg-6">

            <!-- Form Input Field -->
            <div class="form-group">
                <label class="control-label col-lg-3">Full Name <span class="text-danger">*</span></label>
                <div class="col-lg-8">
                    <div class="input-group">
                        <div class="input-group-addon"><i class=" icon-user"></i></div>
                        <input type="text" name="name" value="{{ $editData->name }}" placeholder="Full Name" required class="form-control">
                    </div>
                </div>
            </div>
            <!-- Form Input Field -->
            <div class="form-group">
                <label class="control-label col-lg-3">User Role<span class="text-danger">*</span></label>
                <div class="col-lg-8">
                    <div class="input-group">
                        <div class="input-group-addon"><i class=" icon-user"></i></div>
                        <select class="select" required id="roles" name="roles" >
                            <option value="{{ $editData->roles()->pluck('id')->implode(' ') }}">{{ $editData->roles()->pluck('name')->implode(' ') }}</option>
                            @foreach ($getRoles as $role)
                                <option value="{{ $role->id }}">
                                    {{ $role->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>


            <div class="form-group" style="margin-top: 20px;">
                <div class="col-lg-3"></div>
                <div class="col-lg-7">
                    <a href="{{url('Admin/create')}}" class="btn btn-primary" style="margin-right: 25px;"> <i class="icon-arrow-left12 position-left"></i> Back</a>
                    <button type="button" id="updateAdmin" class="btn btn-success">Update <i class="icon-arrow-right14 position-right"></i></button>
                </div>
            </div>
        </div>

    </form>
    </div>
    </div>

    @include('BackEnd.createAdmin.ajax_request')
    <!-- /main page sources -->
    </div>
    </div>
    </div>
@endsection