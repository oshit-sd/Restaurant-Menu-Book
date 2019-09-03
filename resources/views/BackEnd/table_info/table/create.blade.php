@extends('BackEnd.adminMaster')
@section('table', 'active')
@section('content')

            <form id="Form" method="POST"  action="#" class="form-horizontal InsertForm">
            {{csrf_field()}}


            <!-- Request Url -->
            <input type="hidden" id="Url" value="/table">
              
              <div class="col-lg-2"></div>
              <div class="col-lg-7">

                  <!-- Form Input Field -->
                  <div class="form-group">
                      <label class="control-label col-lg-3">Table Name <span class="text-danger">*</span></label>
                      <div class="col-lg-8">
                          <input type="text" name="fld_name" required placeholder="Table Name" class="form-control">
                      </div>
                  </div>

                  <div class="form-group">
                      <label class="control-label col-lg-3">Table Section Name <span class="text-danger">*</span></label>
                      <div class="col-lg-8">
                          <select name="fld_section_id" data-placeholder="Select section name..." class="select">
                            @foreach($getSectionData as $section)
                              <option value="{{$section->id}}">{{$section->fld_name}}</option>
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
              <th>Table Name</th>
              <th>Table Section Name</th>
              <th class="text-center">Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php $s=1; ?>
            @if ($getData)
            @foreach ($getData as $data)

            <tr>
              <td style="width: 5%;">{{ $s++ }}</td>
              <td style="width: 15%;">{{ $data->fld_name }}</td>
              <td style="width: 15%;">{{ (isset( $data->sectionName->fld_name )) ? $data->sectionName->fld_name:'' }} </td>

              <td class="text-center" style="width: 10%;">

                <ul class="icons-list">
                  <li class="text-primary-600">
                    <a href="{{ url('/table/'.$data->id.'/edit') }}" class=" linka fancybox fancybox.ajax labelSize2 btn btn-primary" data-popup="tooltip" title data-original-title="Edit_Data"><i class="icon-pencil7"></i></a>
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
