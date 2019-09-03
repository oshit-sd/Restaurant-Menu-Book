
<div class="col-sm-12" style="width: 550px;">

    <!-- Page header -->
    <div class="page-header">
        <div class="breadcrumb-line">
            <ul class="breadcrumb">
                <li class="active btn btn-primary btn-xs" style="background: #1D2841;"> 
                    <a href="#" style="color: #ddd;">
                        <i class="icon-plus3"></i> Roles Entry
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <!-- /page header -->


    <!-- Content area -->
    <div class="content" >
        <!-- Main content -->
        <div class="row">
            <div class="col-lg-12">
                <!-- main page sources -->
                <div class="panel panel-flat">
                    <!-- Form validation -->

                    <div class="panel-body">
                        {{ Form::open(array('url' => 'roles')) }}

                            <fieldset class="content-group">
                                <!-- Write Your Code Here -->
                                {{ csrf_field() }}

                                <!-- Form Input Field -->
                                <div class="form-group">
                                  <label class="control-label col-lg-3">Role Name <span class="text-danger">*</span></label>
                                  <div class="col-lg-9">
                                    <div class="input-group">
                                      <div class="input-group-addon"><i class=" icon-book3"></i></div>
                                      <input type="text" name="name" required class="form-control" placeholder="Role Name">
                                    </div>
                                  </div>
                                </div>


                            </fieldset>

                            <div class="text-right">
                                <button type="submit" class="btn btn-success">Submit <i class="icon-arrow-right14 position-right"></i></button>
                            </div>

                        {{ Form::close() }}
                    </div>

                </div>
            </div>

            <!-- /main page sources -->
        </div>
        <!-- /main content -->
    </div>
</div>


    <!-- <h5><b>Assign Permissions</b></h5>

    <div class='form-group'>
        @foreach ($permissions as $permission)
            {{ Form::checkbox('permissions[]',  $permission->id ) }}
            {{ Form::label($permission->name, ucfirst($permission->name)) }}<br>

        @endforeach
    </div> -->

