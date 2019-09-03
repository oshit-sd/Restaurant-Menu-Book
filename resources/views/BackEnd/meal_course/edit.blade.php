@extends('BackEnd.adminMaster')
@section('MealCourse', 'active')
@section('content')

	<form action="{{url('/MealCourse/'.$editData->id)}}" class="form-horizontal form-validate-jquery" method="post">

		<!-- Write Your Code Here -->
		{{ csrf_field() }}
		{{method_field('patch')}}

		<div class="col-lg-2"></div>
		<div class="col-lg-7">

			<!-- Form Input Field -->
			<div class="form-group">
				<label class="control-label col-lg-3">Name <span class="text-danger"></span></label>
				<div class="col-lg-8">
					<input type="text" name="fld_name" value="{{ $editData->fld_name }}" required placeholder="Name" class="form-control">
				</div>
			</div>

			<!-- Form Input Field -->
			<div class="form-group">
				<label class="control-label col-lg-3">Course Level <span class="text-danger"></span></label>
				<div class="col-lg-8">
					<select name="fld_course_level" required class="form-control">
						<option>{{ $editData->fld_course_level }}</option>
						<option>1</option>
						<option>2</option>
						<option>3</option>
						<option>4</option>
						<option>5</option>
						<option>6</option>
						<option>7</option>
						<option>8</option>
						<option>9</option>
						<option>10</option>
					</select>
				</div>
			</div>


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

					<!-- Exist Category Show -->
					@foreach($editData->categories as $category)
						<label class="bg-teal" style="padding: 5px 10px; margin-top: 5px;">
							{{ $category->fld_category }}
							<input type="hidden" id="SubId" value="{{$editData->id}}">
							<input type="hidden" id="URL" value="/removeCategoryM/">
							<a onclick="removeCategory({{$category->id}})" style="color: #040404; padding-left: 10px;font-weight: bold;">
								X
							</a>
						</label>
					@endforeach

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