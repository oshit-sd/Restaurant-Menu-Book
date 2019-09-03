@extends('BackEnd.adminMaster')
@section('MenuitemList', 'active')
@section('content')

<form action="{{url('menuitems/'.$editData->id)}}" class="form-horizontal form-validate-jquery" method="post" enctype="multipart/form-data">
	{{method_field('patch')}}
	{{ csrf_field() }}

	<?php $dt = $cm = $pr = $wt = $wth = $ex = $ag = 0; ?>
	<input type="hidden" id="editID" value="{{ $editData->id }}">

	<div class="col-lg-6">
		<!-- Form Input Field -->
		<div class="form-group">
			<label class="control-label col-lg-3">Name <span class="text-danger">*</span></label>
			<div class="col-lg-8">
				<input type="text" name="fld_name" value="{{$editData->fld_name}}" required placeholder="Name" class="form-control">
			</div>
		</div>

		<!-- Form Input Field -->
		<div class="form-group">
			<label class="control-label col-lg-3">Price <span class="text-danger">*</span></label>
			<div class="col-lg-8">
				<input type="text" name="fld_price" value="{{$editData->fld_price}}" required placeholder="Price" class="form-control">
			</div>
		</div>

		<!-- Form Input Field -->
		<div class="form-group">
			<label class="control-label col-lg-3">Price Type </label>
			<div class="col-lg-8">
				<?php
				isset($editData->fld_price_type) ? $ty = $editData->fld_price_type : $ty = '';
				?>
				<select name="fld_price_type" class="form-control">
					<option value="">Select One</option>
					<option {{ ($ty == 'per person') ? 'selected' : '' }}>
						per person
					</option>
					<option {{ ($ty == 'per pcs') ? 'selected' : '' }}>
						per pcs
					</option>
					<option {{ ($ty == 'per bottle') ? 'selected' : '' }}>
						per bottle
					</option>
					<option {{ ($ty == 'per glass') ? 'selected' : '' }}>
						Per glass
					</option>
				</select>
			</div>
		</div>

		<!-- Form Input Field -->
		<div class="form-group">
			<label class="control-label col-lg-3">Sub-category <span class="text-danger">*</span></label>
			<div class="col-lg-8">
				<select name="fld_subcategory_id" class="select">
					<option value="{{$editData->fld_subcategory_id}}">{{$editData->subCategory->fld_subcategory}}
					</option>
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
				<input type="text" name="fld_serial_numbr" value="{{$editData->fld_serial_numbr}}" placeholder="Serial Numbe" class="form-control">
			</div>
		</div>

		<!-- Form Input Field -->
		<div class="form-group">
			<label class="control-label col-lg-3">Description <span class="text-danger"></span></label>
			<div class="col-lg-8">
				<textarea name="fld_description" rows="6" class="form-control" placeholder="Description">{{$editData->fld_description}}</textarea>
			</div>
		</div>

		<!-- Form Input Field -->
		<div class="form-group">
			<label class="control-label col-lg-3">Image <span class="text-danger"></span></label>
			<div class="col-lg-8">
				<input type="file" name="image" class="form-control">
				<input type="hidden" name="fld_image" value="{{$editData->fld_image}}" class="form-control">
			</div>
		</div>

		<!-- Form Input Field -->
		<div class="form-group">
			<label class="control-label col-lg-3">Dietary <span class="text-danger"></span></label>
			<div class="col-lg-8">
				<select name="fld_dietary[]" data-placeholder="Select Dietary..." multiple="multiple" class="select">
					{{--Check Exist Dietary--}}
					<?php $arr[] = ""; ?>
					@foreach($editData->dietaries as $dietaryId))
					@php $arr[] = $dietaryId->id; @endphp
					@endforeach

					@foreach($getDietary as $dietaryName)
					@if(!in_array($dietaryName->id, $arr))
					<option value="{{$dietaryName->id}}">{{$dietaryName->fld_name}}</option>
					@endif
					@endforeach
				</select>

				<!-- Exist Dietary Show -->
				@foreach($editData->dietaries as $dietary)
				<label class="bg-teal" style="padding: 5px 10px; margin-top: 5px;">
					{{ $dietary->fld_name }}
					<input type="hidden" class="dietary_{{$dt}}_id" value="{{$dietary->id}}">
					<input type="hidden" id="URL_dietary_{{$dt}}" value="/removeDietaryMI/">
					<a onclick="removeRelations('dietary_{{$dt}}')" style="color: #040404; padding-left: 10px;font-weight: bold;">
						X
					</a>
				</label>
				<?php $dt++; ?>
				@endforeach
			</div>
		</div>

		<!-- Form Input Field -->
		<div class="form-group">
			<label class="control-label col-lg-3">Name Show <span class="text-danger"></span></label>
			<div class="col-lg-8">
				<input type="radio" name="fld_name_show" {{($editData->fld_name_show=='Yes')?'checked':''}} value="Yes">
				Yes &nbsp;&nbsp;&nbsp;
				<input type="radio" name="fld_name_show" {{($editData->fld_name_show=='No')?'checked':''}} value="No">
				No
			</div>
		</div>

	</div>


	<div class="col-lg-6">

		<!-- Form Input Field -->
		<div class="form-group">
			<label class="control-label col-lg-3">Condiments<span class="text-danger"></span></label>
			<div class="col-lg-8">
				<select name="fld_condiments[]" data-placeholder="Select Condiments Group..." multiple="multiple" class="select">
					{{--Check Exist Condiments--}}
					<?php $arr1[] = ""; ?>
					@foreach($editData->condiments_group as $conGroupId))
					@php $arr1[] = $conGroupId->id; @endphp
					@endforeach

					@foreach($getCondiments as $cnd)
					@if(!in_array($cnd->id, $arr1))
					<option value="{{$cnd->id}}">{{$cnd->fld_name}}</option>
					@endif
					@endforeach
				</select>

				<!-- Exist Condiments Show -->
				@foreach($editData->condiments_group as $conGroup)
				<label class="bg-teal" style="padding: 5px 10px; margin-top: 5px;">
					{{ $conGroup->fld_name }}
					<input type="hidden" class="condiment_{{$cm}}_id" value="{{$conGroup->id}}">
					<input type="hidden" id="URL_condiment_{{$cm}}" value="/removeCondimentMI/">
					<a onclick="removeRelations('condiment_{{$cm}}')" style="color: #040404; padding-left: 10px;font-weight: bold;">
						X
					</a>
				</label>
				<?php $cm++; ?>
				@endforeach
			</div>
		</div>

		<!-- Form Input Field -->
		<div class="form-group">
			<label class="control-label col-lg-3">Preparation<span class="text-danger"></span></label>
			<div class="col-lg-8">
				<select name="fld_preparations[]" data-placeholder="Select Preparation Group..." multiple="multiple" class="select">
					{{--Check Exist Preparation--}}
					<?php $arrP[] = ""; ?>
					@foreach($editData->preparation_group as $preGroupId))
					@php $arrP[] = $preGroupId->id; @endphp
					@endforeach

					@foreach($getPreparation as $pre)
					@if(!in_array($pre->id, $arrP))
					<option value="{{$pre->id}}">{{$pre->fld_name}}</option>
					@endif
					@endforeach
				</select>

				<!-- Exist Preparation Show -->
				@foreach($editData->preparation_group as $preGroup)
				<label class="bg-teal" style="padding: 5px 10px; margin-top: 5px;">
					{{ $preGroup->fld_name }}
					<input type="hidden" class="preparation_{{$pr}}_id" value="{{$preGroup->id}}">
					<input type="hidden" id="URL_preparation_{{$pr}}" value="/removePreparationMI/">
					<a onclick="removeRelations('preparation_{{$pr}}')" style="color: #040404; padding-left: 10px;font-weight: bold;">
						X
					</a>
				</label>
				<?php $pr++; ?>
				@endforeach
			</div>
		</div>

		<!-- Form Input Field -->
		<div class="form-group">
			<label class="control-label col-lg-3">With<span class="text-danger"></span></label>
			<div class="col-lg-8">
				<select name="fld_ingredient[]" data-placeholder="Select With Ingredients ..." multiple="multiple" class="select">
					{{--Check Exist With--}}
					<?php $arr2[] = ""; ?>
					@foreach($editData->ingredient_group as $withId))
					@php if($withId->fld_with == 1): $arr2[] = $withId->id; endif; @endphp
					@endforeach

					@foreach($getIngredientWith as $withName)
					@if(!in_array($withName->id, $arr2))
					<option value="{{$withName->id}}">{{$withName->fld_name}}</option>
					@endif
					@endforeach
				</select>

				<!-- Exist With Show -->
				@foreach($editData->ingredient_group as $with)
				@if($with->fld_with == 1)
				<label class="bg-teal" style="padding: 5px 10px; margin-top: 5px;">
					{{ $with->fld_name }}
					<input type="hidden" class="with_{{$wt}}_id" value="{{$with->id}}">
					<input type="hidden" id="URL_with_{{$wt}}" value="/removeIngredientMI/">
					<a onclick="removeRelations('with_{{$wt}}')" style="color: #040404; padding-left: 10px;font-weight: bold;">
						X
					</a>
				</label>
				<?php $wt++; ?>
				@endif
				@endforeach
			</div>
		</div>

		<!-- Form Input Field -->
		<div class="form-group">
			<label class="control-label col-lg-3">Without<span class="text-danger"></span></label>
			<div class="col-lg-8">
				<select name="fld_ingredient[]" data-placeholder="Select Without Ingredients ..." multiple="multiple" class="select">
					{{--Check Exist Without--}}
					<?php $arr3[] = ""; ?>
					@foreach($editData->ingredient_group as $withoutId))
					@php if($withoutId->fld_without == 1): $arr3[] = $withoutId->id; endif; @endphp
					@endforeach

					@foreach($getIngredientWithout as $withoutName)
					@if(!in_array($withoutName->id, $arr3))
					<option value="{{$withoutName->id}}">{{$withoutName->fld_name}}</option>
					@endif
					@endforeach
				</select>

				<!-- Exist Without Show -->
				@foreach($editData->ingredient_group as $without)
				@if($without->fld_without == 1)
				<label class="bg-teal" style="padding: 5px 10px; margin-top: 5px;">
					{{ $without->fld_name }}
					<input type="hidden" class="without_{{$wth}}_id" value="{{$without->id}}">
					<input type="hidden" id="URL_without_{{$wth}}" value="/removeIngredientMI/">
					<a onclick="removeRelations('without_{{$wth}}')" style="color: #040404; padding-left: 10px;font-weight: bold;">
						X
					</a>
				</label>
				<?php $wth++; ?>
				@endif
				@endforeach
			</div>
		</div>

		<!-- Form Input Field -->
		<div class="form-group">
			<label class="control-label col-lg-3">Extras<span class="text-danger"></span></label>
			<div class="col-lg-8">
				<select name="fld_ingredient[]" data-placeholder="Select Extras Ingredients ..." multiple="multiple" class="select">
					<?php $arr4[] = ""; ?>
					@foreach($editData->ingredient_group as $extraId))
					@php if($extraId->fld_extras == 1): $arr4[] = $extraId->id; endif; @endphp
					@endforeach

					@foreach($getIngredientExtras as $extraName)
					@if(!in_array($extraName->id, $arr4))
					<option value="{{$extraName->id}}">{{$extraName->fld_name}}</option>
					@endif
					@endforeach
				</select>

				<!-- Exist Extras Show -->
				@foreach($editData->ingredient_group as $extra)
				@if($extra->fld_extras == 1)
				<label class="bg-teal" style="padding: 5px 10px; margin-top: 5px;">
					{{ $extra->fld_name }}
					<input type="hidden" class="extra_{{$ex}}_id" value="{{$extra->id}}">
					<input type="hidden" id="URL_extra_{{$ex}}" value="/removeIngredientMI/">
					<a onclick="removeRelations('extra_{{$ex}}')" style="color: #040404; padding-left: 10px;font-weight: bold;">
						X
					</a>
				</label>
				<?php $ex++; ?>
				@endif
				@endforeach
			</div>
		</div>

		<!-- Form Input Field -->
		<div class="form-group">
			<label class="control-label col-lg-3">Spice Level <span class="text-danger"></span></label>
			<div class="col-lg-8">
				<select name="fld_spice_level" class="select">
					<option value="{{ isset($editData->fld_spice_level)?$editData->fld_spice_level:'' }}">
						{{ isset($editData->SpiceLevel->fld_name)?$editData->SpiceLevel->fld_name:'No spice level' }}
					</option>
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
					<option value="{{ isset($editData->fld_meal_course)? $editData->fld_meal_course: ''}}">
						{{ isset($editData->MealCourse->fld_name)?$editData->MealCourse->fld_name:'No meal course' }}
					</option>
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

					{{--Check Exist Allergy--}}
					<?php $arr5[] = ""; ?>
					@foreach($editData->allergies as $allergyId))
					@php $arr5[] = $allergyId->id; @endphp
					@endforeach

					@foreach($getAllergy as $allergyName)
					@if(!in_array($allergyName->id, $arr5))
					<option value="{{$allergyName->id}}">{{$allergyName->fld_name}}</option>
					@endif
					@endforeach
				</select>

				<!-- Exist Allergy Show -->
				@foreach($editData->allergies as $allergy)
				<label class="bg-teal" style="padding: 5px 10px; margin-top: 5px;">
					{{ $allergy->fld_name }}
					<input type="hidden" class="allergy_{{$ag}}_id" value="{{$allergy->id}}">
					<input type="hidden" id="URL_allergy_{{$ag}}" value="/removeAllergyMI/">
					<a onclick="removeRelations('allergy_{{$ag}}')" style="color: #040404; padding-left: 10px;font-weight: bold;">
						X
					</a>
				</label>
				<?php $ag++; ?>
				@endforeach
			</div>
		</div>

		<div class="text-center" style="margin-top: 15px;">
			<button type="reset" class="btn btn-default" id="reset">Reset <i class="icon-reload-alt position-right"></i></button> &nbsp;
			<button type="submit" class="btn btn-success">Update <i class="icon-arrow-right14 position-right"></i></button>
		</div>
	</div>

</form>
</div>
</div>
<!-- /main page sources -->
</div>
<!-- /main content -->
</div>
</div>


@endsection