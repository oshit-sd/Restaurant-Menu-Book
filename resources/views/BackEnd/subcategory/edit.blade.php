@extends('BackEnd.adminMaster')
@section('subcategory', 'active')
@section('content')

<form action="{{url('/subcategory/'.$editData->id)}}" class="form-horizontal form-validate-jquery" method="post">

	<!-- Write Your Code Here -->
	{{ csrf_field() }}
	{{method_field('patch')}}

	<div class="col-lg-2"></div>
	<div class="col-lg-7">
		<?php //echo "<pre>"; print_r($editData->categories); die; 
		?>
		<!-- Form Input Field -->
		<div class="form-group">
			<label class="control-label col-lg-3">Category <span class="text-danger">*</span></label>
			<div class="col-lg-8">
				<select name="fld_category_id[]" data-placeholder="Select Category..." multiple="multiple" class="select">

					{{--Check Exist Category--}}
					<?php $arr[] = ""; ?>
					@foreach($editData->categories as $CateGory))
					@php $arr[] = $CateGory->id; @endphp
					@endforeach

					@foreach($getCategory as $Cate)
					@if(!in_array($Cate->id, $arr))
					<option value="{{$Cate->id}}">{{$Cate->fld_category}}</option>
					@endif
					@endforeach

				</select>

				<!-- Old Preparation ID -->
				<input type="hidden" name="old_category" value="{{ (count($arr)!=1)? '1' :'0' }}">


				<!-- Exist Category Show -->
				@foreach($editData->categories as $category)
				<label class="bg-teal" style="padding: 5px 10px; margin-top: 5px;">
					{{ $category->fld_category }}
					<input type="hidden" id="editID" value="{{$editData->id}}">
					<input type="hidden" class="category_{{$category->id}}_id" value="{{$category->id}}">
					<input type="hidden" id="URL_category_{{$category->id}}" value="/removeCategoryS/">
					<a onclick="removeRelations('category_{{$category->id}}')" style="color: #040404; padding-left: 10px;font-weight: bold;">
						X
					</a>
				</label>
				@endforeach
			</div>
		</div>

		<!-- Form Input Field -->
		<div class="form-group">
			<label class="control-label col-lg-3">Name <span class="text-danger"></span></label>
			<div class="col-lg-8">
				<input type="text" name="fld_subcategory" value="{{ $editData->fld_subcategory }}" required placeholder="Name" class="form-control">
			</div>
		</div>

		<!-- Form Input Field -->
		<div class="form-group">
			<label class="control-label col-lg-3">Front Size <span class="text-danger"></span></label>
			<div class="col-lg-8">
				<input type="text" name="fld_front_size" value="{{ $editData->fld_front_size }}" placeholder="Front Size" class="form-control">
			</div>
		</div>

		<!-- Form Input Field -->
		<div class="form-group">
			<label class="control-label col-lg-3">Bold <span class="text-danger"></span></label>
			<div class="col-lg-8">
				<input type="radio" {{($editData->fld_bold=="Yes")?"checked":""}} value="Yes" name="fld_bold"> Yes &nbsp;&nbsp;&nbsp;
				<input type="radio" {{($editData->fld_bold=="No")?"checked":""}} name="fld_bold" value="No"> No

			</div>
		</div>

		<div class="text-center" style="margin-top: 15px;">
			<button type="submit" class="btn btn-success">Update <i class="icon-arrow-right14 position-right"></i></button>
		</div>
	</div>



</form>
</div>

</div>
</div>

<!-- /main page sources -->

@include('BackEnd.ajax_request')
@endsection