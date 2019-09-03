@extends('BackEnd.adminMaster')
@section('preparationGroup', 'active')
@section('content')

    <form action="{{url('/preparationGroup/'.$editData->id)}}" class="form-horizontal form-validate-jquery" method="post">
        {{ csrf_field() }}
        {{method_field('patch')}}

        <div class="col-lg-2"></div>
        <div class="col-lg-7">

            <!-- Form Input Field -->
            <div class="form-group">
                <label class="control-label col-lg-3">Group Name <span class="text-danger">*</span></label>
                <div class="col-lg-8">
                    <input type="text" name="fld_name" value="{{$editData->fld_name}}" required placeholder="Group Name" class="form-control">
                </div>
            </div>

            <!-- Form Input Field -->
            <div class="form-group">
                <label class="control-label col-lg-3">Preparation <span class="text-danger">*</span></label>
                <div class="col-lg-8">
                    <select name="fld_preparation_id[]" data-placeholder="Select Preparation..." multiple="multiple" class="select">
                        {{--Check Exist Preparation--}}
                        <?php $arr[] = ""; ?>
                        @foreach($editData->preparation as $preparation))
                        <?php $arr[] = $preparation->id; ?>
                        @endforeach

                        @foreach($getPreparation as $preparation)
                            @if(!in_array($preparation->id, $arr))
                                <option value="{{$preparation->id}}">{{$preparation->fld_name}}</option>

                            @endif

                        @endforeach
                    </select>


                    <!-- Old Preparation ID -->
                    <input type="hidden" name="old_preparation" value="{{ (count($arr)!=1)? '1' :'0' }}">

                    <!-- Exist Category Show -->
                    @foreach($editData->preparation as $preparation)
                        <label class="bg-teal" style="padding: 5px 10px; margin-top: 5px;">
                            {{ $preparation->fld_name }}
                            <input type="hidden" id="editID" value="{{$editData->id}}">
                            <input type="hidden" class="preparation_{{$preparation->id}}_id" value="{{$preparation->id}}">
                            <input type="hidden" id="URL_preparation_{{$preparation->id}}" value="/removePreparationG/">
                            <a onclick="removeRelations('preparation_{{$preparation->id}}')" style="color: #040404; padding-left: 10px;font-weight: bold;">
                                X
                            </a>
                        </label>
                    @endforeach

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
    </div>

    <!-- /main page sources -->
    </div>
    </div>
@endsection
