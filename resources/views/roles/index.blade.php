@extends('BackEnd.adminMaster')
@section('AssignPermissions', 'active')
@section('content')

    <a href="{{ URL::to('roles/create') }}" class="btn btn-success linka fancybox fancybox.ajax">Roles Entry <i class="icon-plus2"></i> </a>

    <!--============== List of data ==============-->
    <!--============== List of data ==============-->
    <div class="panel panel-flat" style="margin-top: 0px;">
        <!-- Form validation -->
        <table class="table table-bordered table-hover datatable-highlight">
            <thead>
            <tr>
                <th>SL</th>
                <th>Role</th>
                <th>Permission</th>
                <th class="text-center">Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php $s=1; ?>
            @if ($roles)
                @foreach ($roles as $role)

                    <tr>
                        <td style="width: 5%;">{{ $s++ }}</td>
                        <td style="width: 15%;">{{ $role->name }}</td>

                        <td>
                            @foreach($role->permissions()->pluck('name') as $name)
                                <label class="bg-teal-400" style="margin: 3px;"><span style="padding: 0px 8px ;">{{$name}}</span></label>
                            @endforeach
                        </td>

                        <td class="text-center" style="width: 10%;">

                            @if($role->name != "Super Admin")
                                <ul class="icons-list">
                                    <li class="text-primary-600">
                                        <a href="{{ URL::to('roles/'.$role->id.'/edit') }}" class="labelSize2 btn btn-primary" data-popup="tooltip" title data-original-title="Access_Privilege"><i class="icon-user-lock"></i></a>
                                    </li>
                                    <li class="text-danger-600">
                                        {!! Form::open(['method' => 'DELETE', 'route' => ['roles.destroy', $role->id] ]) !!}
                                        {{ csrf_field() }}
                                        <button class="labelSize3 btn btn-danger" type="submit" data-popup="tooltip" title data-original-title="Delete_Role"><i class="icon-trash"></i></button>
                                        {!! Form::close() !!}

                                    </li>
                                </ul>
                            @endif
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