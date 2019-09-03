

@extends('BackEnd.adminMaster')
@section('save_admin', 'active')
@section('content')

          {{ Form::model($role, array('route' => array('roles.update', $role->id), 'method' => 'PUT')) }}
            

           <div class="col-lg-6" style="border-left: 1px solid #23bdbb; border-right: 1px solid #23bdbb;">
               
                @foreach ($permissions as $permission)

                    {{Form::checkbox('permissions[]',  $permission->id, $role->permissions) }}
                    {{Form::label($permission->name, ucfirst($permission->name)) }}<br>

                @endforeach
            </div>



            <div class="col-lg-6">
                
            </div>

            <div class="col-lg-12" style=" margin-top: 25px;">
                <!-- Form Input Field -->
                <div class="form-group">
                  <label class="control-label col-lg-2">Role Name <span class="text-danger">*</span></label>
                  <div class="col-lg-3">
                    <div class="input-group">
                      <div class="input-group-addon"><i class=" icon-envelop"></i></div>
                      <input type="text" name="name" value="{{$role->name}}" required placeholder="Role Name" class="form-control">
                    </div>
                  </div>
                </div>

                <div class="col-lg-4"></div>
                <div class="col-lg-2">
                  <button type="submit"  class="btn btn-primary">Access Privilege<i class="icon-arrow-right14 position-right"></i></button>
                </div>

                
              </div>

            </div>

          {{ Form::close() }}  
        </div>
        
      </div>
    </div>
@endsection


