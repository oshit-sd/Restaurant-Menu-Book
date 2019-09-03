@extends('BackEnd.adminMaster')
@section('IngredientGroup', 'active')
@section('content')

    <form action="{{url('/IngredientGroup/'.$editData->id)}}" class="form-horizontal form-validate-jquery" method="post">
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
                <label class="control-label col-lg-3">Ingredient <span class="text-danger">*</span></label>
                <div class="col-lg-8">
                    <select name="fld_ingredient_id[]" data-placeholder="Select Ingredient..." multiple="multiple" class="select">
                        {{--Check Exist Ingredient--}}
                        <?php $arr[] = ""; ?>
                        @foreach($editData->ingredient as $ingredient))
                        <?php $arr[] = $ingredient->id; ?>
                        @endforeach

                        @foreach($getIngredient as $ingredient)
                            @if(!in_array($ingredient->id, $arr))
                                <option value="{{$ingredient->id}}">{{$ingredient->fld_name}}</option>

                            @endif

                        @endforeach
                    </select>

                    <!-- Old Ingredient ID -->
                    <input type="hidden" name="old_ingredient" value="{{ (count($arr)!=1)? '1' :'0' }}">

                    <!-- Exist Category Show -->
                    @foreach($editData->ingredient as $ingredient)
                        <label class="bg-teal" style="padding: 5px 10px; margin-top: 5px;">
                            {{ $ingredient->fld_name }}
                            <input type="hidden" id="editID" value="{{$editData->id}}">
                            <input type="hidden" class="ingredient_{{$ingredient->id}}_id" value="{{$ingredient->id}}">
                            <input type="hidden" id="URL_ingredient_{{$ingredient->id}}" value="/removeIngredientG/">
                            <a onclick="removeRelations('ingredient_{{$ingredient->id}}')" style="color: #040404; padding-left: 10px;font-weight: bold;">
                                X
                            </a>
                        </label>
                    @endforeach

                </div>
            </div>

            <!-- Form Input Field -->
            <div class="form-group">
                <label class="control-label col-lg-3">Select Type <span class="text-danger"></span></label>
                <div class="col-lg-8">
                    <input type="checkbox" {{(isset($editData->fld_with)?'checked':'')}} name="fld_with" value="1" class="check_1" onclick="checkboxValue(1)"> <b>With</b> &nbsp;&nbsp;
                    <input type="checkbox" {{(isset($editData->fld_without)?'checked':'')}} name="fld_without" value="1" class="check_2"  onclick="checkboxValue(2)"> <b>Without</b> &nbsp;&nbsp;
                    <input type="checkbox" {{(isset($editData->fld_extras)?'checked':'')}} name="fld_extras" value="1" class="check_3"  onclick="checkboxValue(3)"> <b>Extras</b>
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
