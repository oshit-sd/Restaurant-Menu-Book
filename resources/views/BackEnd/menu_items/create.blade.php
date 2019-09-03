@extends('BackEnd.adminMaster')
@section('menuitems', 'active')
@section('content')

<form id="Form" method="POST" action="#" class="form-horizontal InsertForm">
    {{csrf_field()}}


    <!-- Request Url -->
    <input type="hidden" id="Url" value="/menuitems">

    <div class="col-lg-6">
        <!-- Form Input Field -->
        <div class="form-group">
            <label class="control-label col-lg-3">Name <span class="text-danger">*</span></label>
            <div class="col-lg-8">
                <input type="text" name="fld_name" required placeholder="Name" class="form-control">
            </div>
        </div>

        <!-- Form Input Field -->
        <div class="form-group">
            <label class="control-label col-lg-3">Price <span class="text-danger">*</span></label>
            <div class="col-lg-8">
                <input type="number" name="fld_price" required placeholder="Price" class="form-control">
            </div>
        </div>

        <!-- Form Input Field -->
        <div class="form-group">
            <label class="control-label col-lg-3">Price Type</label>
            <div class="col-lg-8">
                <select name="fld_price_type" class="form-control">
                    <option value="">Select One</option>
                    <option>per person</option>
                    <option>Per pcs</option>
                    <option>per bottle</option>
                    <option>Per glass</option>
                </select>
            </div>
        </div>




        <!-- Form Input Field -->
        <div class="form-group">
            <label class="control-label col-lg-3">Sub-category <span class="text-danger">*</span></label>
            <div class="col-lg-8">
                <select name="fld_subcategory_id" class="select">
                    <option value="">Select Sub-Category</option>
                    @foreach($getSubcategory as $SCate)
                    <option value="{{$SCate->id}}">{{$SCate->fld_subcategory}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <!-- Form Input Field -->
        <div class="form-group">
            <label class="control-label col-lg-3">Serial Number <span class="text-danger"></span></label>
            <div class="col-lg-8">
                <input type="text" name="fld_serial_numbr" placeholder="Serial Numbe" class="form-control">
            </div>
        </div>


        <!-- Form Input Field -->
        <div class="form-group">
            <label class="control-label col-lg-3">Description <span class="text-danger"></span></label>
            <div class="col-lg-8">
                <textarea name="fld_description" rows="6" class="form-control" placeholder="Description"></textarea>
            </div>
        </div>

        <!-- Form Input Field -->
        <div class="form-group">
            <label class="control-label col-lg-3">Image <span class="text-danger"></span></label>
            <div class="col-lg-8">
                <input type="file" name="fld_image" class="form-control">
            </div>
        </div>

        <!-- Form Input Field -->
        <div class="form-group">
            <label class="control-label col-lg-3">Dietary <span class="text-danger"></span></label>
            <div class="col-lg-8">
                <select name="fld_dietary[]" data-placeholder="Select Dietary..." multiple="multiple" class="select">
                    @foreach($getDietary as $dietary)
                    <option value="{{$dietary->id}}">{{$dietary->fld_name}}</option>
                    @endforeach
                </select>
            </div>
        </div>


        <!-- Form Input Field -->
        <div class="form-group">
            <label class="control-label col-lg-3">Name Show <span class="text-danger"></span></label>
            <div class="col-lg-8">
                <input type="radio" name="fld_name_show" value="Yes"> Yes &nbsp;&nbsp;&nbsp;
                <input type="radio" name="fld_name_show" value="No" checked> No
            </div>
        </div>

    </div>


    <div class="col-lg-6">

        <!-- Form Input Field -->
        <div class="form-group">
            <label class="control-label col-lg-3">Condiments<span class="text-danger"></span></label>
            <div class="col-lg-8">
                <select name="fld_condiments[]" data-placeholder="Select Condiments Group..." multiple="multiple" class="select">
                    @foreach($getCondiments as $cnd)
                    <option value="{{$cnd->id}}">{{$cnd->fld_name}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <!-- Form Input Field -->
        <div class="form-group">
            <label class="control-label col-lg-3">Preparation<span class="text-danger"></span></label>
            <div class="col-lg-8">
                <select name="fld_preparations[]" data-placeholder="Select Preparation Group..." multiple="multiple" class="select">
                    @foreach($getPreparation as $pre)
                    <option value="{{$pre->id}}">{{$pre->fld_name}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <!-- Form Input Field -->
        <div class="form-group">
            <label class="control-label col-lg-3">With<span class="text-danger"></span></label>
            <div class="col-lg-8">
                <select name="fld_ingredient[]" data-placeholder="Select With Ingredients ..." multiple="multiple" class="select">
                    @foreach($getIngredientWith as $with)
                    <option value="{{$with->id}}">{{$with->fld_name}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <!-- Form Input Field -->
        <div class="form-group">
            <label class="control-label col-lg-3">Without<span class="text-danger"></span></label>
            <div class="col-lg-8">
                <select name="fld_ingredient[]" data-placeholder="Select Without Ingredients ..." multiple="multiple" class="select">
                    @foreach($getIngredientWithout as $without)
                    <option value="{{$without->id}}">{{$without->fld_name}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <!-- Form Input Field -->
        <div class="form-group">
            <label class="control-label col-lg-3">Extras<span class="text-danger"></span></label>
            <div class="col-lg-8">
                <select name="fld_ingredient[]" data-placeholder="Select Extras Ingredients ..." multiple="multiple" class="select">
                    @foreach($getIngredientExtras as $extra)
                    <option value="{{$extra->id}}">{{$extra->fld_name}}</option>
                    @endforeach
                </select>
            </div>
        </div>


        <!-- Form Input Field -->
        <div class="form-group">
            <label class="control-label col-lg-3">Spice Level <span class="text-danger"></span></label>
            <div class="col-lg-8">
                <select name="fld_spice_level" class="select">
                    <option value="">Select Spice Level</option>
                    @foreach($getSpicelevel as $spice)
                    <option value="{{$spice->id}}">{{$spice->fld_name}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <!-- Form Input Field -->
        <div class="form-group">
            <label class="control-label col-lg-3">Meal Course <span class="text-danger"></span></label>
            <div class="col-lg-8">
                <select name="fld_meal_course" class="select">
                    <option value="">Select Meal Course</option>
                    @foreach($getMealCourse as $meal)
                    <option value="{{$meal->id}}">{{$meal->fld_name}}</option>
                    @endforeach
                </select>
            </div>
        </div>


        <!-- Form Input Field -->
        <div class="form-group">
            <label class="control-label col-lg-3">Allergy <span class="text-danger"></span></label>
            <div class="col-lg-8">
                <select name="fld_allergy[]" data-placeholder="Select Allergy..." multiple="multiple" class="select">
                    @foreach($getAllergy as $allergy)
                    <option value="{{$allergy->id}}">{{$allergy->fld_name}}</option>
                    @endforeach
                </select>
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