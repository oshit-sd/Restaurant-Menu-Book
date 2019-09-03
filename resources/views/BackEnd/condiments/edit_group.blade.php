@extends('BackEnd.adminMaster')
@section('CondimentsGroup', 'active')
@section('content')

<form action="{{url('/condimentsGroup/'.$editData->id)}}" class="form-horizontal form-validate-jquery" method="post">
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
            <label class="control-label col-lg-3">Condiments <span class="text-danger">*</span></label>
            <div class="col-lg-8">
                <select name="fld_condiments_id[]" data-placeholder="Select Condiments..." multiple="multiple" class="select">
                    {{--Check Exist Condiments--}}
                    <?php $arr[] = ""; ?>
                    @foreach($editData->condiments as $condiMent))
                    <?php $arr[] = $condiMent->id; ?>
                    @endforeach

                    @foreach($getCondiments as $condiment)
                    @if(!in_array($condiment->id, $arr))
                    <option value="{{$condiment->id}}">{{$condiment->fld_condiment_name}}</option>
                    @endif
                    @endforeach
                </select>

                <!-- Old Preparation ID -->
                <input type="hidden" name="old_condiment" value="{{ (count($arr)!=1)? '1' :'0' }}">

                <!-- Exist Category Show -->
                @foreach($editData->condiments as $condiMent)
                <label class="bg-teal" style="padding: 5px 10px; margin-top: 5px;">
                    {{ $condiMent->fld_condiment_name }}
                    <input type="hidden" id="editID" value="{{$editData->id}}">
                    <input type="hidden" class="condiment_{{$condiMent->id}}_id" value="{{$condiMent->id}}">
                    <input type="hidden" id="URL_condiment_{{$condiMent->id}}" value="/removeCondimentG/">
                    <a onclick="removeRelations('condiment_{{$condiMent->id}}')" style="color: #040404; padding-left: 10px;font-weight: bold;">
                        X
                    </a>
                </label>
                @endforeach

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
</div>

<!-- /main page sources -->
</div>
</div>
@endsection