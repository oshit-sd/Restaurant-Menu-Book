@extends('BackEnd.adminMaster')
@section('save_admin', 'active')
@section('content')

  <form id="AdminFrom" method="POST"  action="#" class="form-horizontal form-validate-jquery">
    <input type="hidden" value="{{ csrf_token() }}" name="_token">
    {{ csrf_field() }}
    <input type="hidden" value="{{ Auth::user()->id }}" name="add_by">

    <div class="col-lg-3"></div>


    <div class="col-lg-6">


      <!-- Form Input Field -->
      <div class="form-group">
        <label class="control-label col-lg-3">Full  Name <span class="text-danger">*</span></label>
        <div class="col-lg-8">
          <div class="input-group">
            <div class="input-group-addon"><i class="  icon-user-tie"></i></div>
            <input type="text" name="name" required  id="Fname" placeholder="Full Name" class="form-control">
          </div>
          <span id="fNameReq" style="color: red; font-size: 12px; font-weight: bold;"></span>
        </div>
      </div>


      <!-- Form Input Field -->
      <div class="form-group">
        <label class="control-label col-lg-3">User Role<span class="text-danger">*</span></label>
        <div class="col-lg-8">
          <div class="input-group">
            <div class="input-group-addon"><i class=" icon-user"></i></div>
            <select class="select" required id="roles" name="roles" >
              <option value="">Select a User Role</option>
              @foreach ($getRoles as $role)
                <option value="{{ $role->id }}">
                  {{ $role->name }}
                </option>
              @endforeach
            </select>
          </div>
        </div>
      </div>


      <!-- Form Input Field -->
      <div class="form-group">
        <label class="control-label col-lg-3">Username <span class="text-danger">*</span></label>
        <div class="col-lg-8">
          <div class="input-group">
            <div class="input-group-addon"><i class=" icon-user"></i></div>
            <input type="text" name="username" id="username" class="form-control" required placeholder="Enter a username">
          </div>
          <span id="unReq" style="color: red; font-size: 12px; font-weight: bold;"></span>
        </div>
      </div>


      <!-- Form Input Field -->
      <div class="form-group">
        <label class="control-label col-lg-3">Password <span class="text-danger">*</span></label>
        <div class="col-lg-8">
          <div class="input-group">
            <div class="input-group-addon"><i class=" icon-lock"></i></div>
            <input type="password" name="password" min="6" id="password" class="form-control" required placeholder="Password">
          </div>
          <span id="pReq" style="color: red; font-size: 12px; font-weight: bold;"></span>
        </div>
      </div>


      <!-- Form Input Field -->
      <div class="form-group">
        <label class="control-label col-lg-3">Re. password <span class="text-danger">*</span></label>
        <div class="col-lg-8">
          <div class="input-group">
            <div class="input-group-addon"><i class=" icon-lock"></i></div>
            <input type="password" name="repeat_password" id="repeat_password" class="form-control" required="required" min="6" placeholder="Confirm Password">
          </div>
          <span id="rpReq" style="color: red; font-size: 12px; font-weight: bold;"></span>
        </div>
      </div>


      <div class="form-group" style="margin-top: 20px;">
        <div class="col-lg-3"></div>
        <div class="col-lg-7">
          <button type="reset" class="btn btn-default" id="reset">Reset <i class="icon-reload-alt position-right"></i></button> &nbsp;
          <button type="button" id="InsertAdmin" class="btn btn-primary">Submit <i class="icon-arrow-right14 position-right"></i></button>
        </div>
      </div>

    </div>

  </form>
  </div>
  </div>



  <!--============== List of data ==============-->
  <!--============== List of data ==============-->
  <div class="panel panel-flat" style="margin-top: 0px;">
    <!-- Form validation -->
    <span id="searchResult">
          <div class="table-responsive" style="width:100%;">
            <table class="table table-bordered table-hover datatable-highlight">
              <thead>
                <tr>
                  <th>Full Name</th>
                  <th>Username</th>
                  <th>Assign Role</th>
                  <th class="text-center">Actions</th>
                </tr>
              </thead>
              <tbody>
                @if ($getAdminList)
                  @foreach ($getAdminList as $data)
                    <tr>
                      <td style="width: 16%;">{{ $data->name }}</td>
                      <td style="width: 7%;">{{ $data->username }}</td>
                      <td style="width: 7%;">{{ $data->roles()->pluck('name')->implode(' ') }}</td>

                      <td style="width: 15%;" class="text-center">

                        <ul class="icons-list">
                            @if(Auth::user()->id != $data->id)
                            <li class="text-info-600">
                                <a href="{{ url('/UserChangePass/'.$data->id) }}" class="linka fancybox fancybox.ajax labelSize btn bg-teal" data-popup="tooltip" title data-original-title="Change_Password"><i class="icon-lock"></i></a>
                              </li>
                          @endif

                            <li class="text-primary-600">
                              <a href="{{ url('/Admin/'.$data->id.'/edit') }}" class="labelSize2 btn btn-primary" data-popup="tooltip" title data-original-title="Edit_Data"><i class="icon-pencil7"></i></a>
                            </li>

                            @if(Auth::user()->id != $data->id && isset($RoleName->name) == "Super Admin")
                            <li class="text-danger-600">
                                  <form method="delete" class="deleteForm">
                                    <input type="hidden" value="{{ csrf_token() }}" name="_token">
                                    {{ csrf_field() }}
                                    <a class="labelSize3 btn btn-danger" style="color:red;" onclick="deleteAdmin(<?php echo $data->id ?>)"  data-popup="tooltip" title data-original-title="Delete_Data"><i class="icon-bin"></i></a>
                                  </form>
                                </li>
                          @endif
                          </ul>

                      </td>
                    </tr>

                  @endforeach @endif


                @include('BackEnd.createAdmin.ajax_request')
              </tbody>
            </table>
          </div>
        </span>
  </div>
  </div>
  <!-- /main page sources -->
  </div>
  </div>
@endsection
