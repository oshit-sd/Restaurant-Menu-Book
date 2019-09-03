
<div class="col-sm-12" style="width: 550px;">

	<!-- Page header -->
	<div class="page-header">
		<div class="breadcrumb-line">
			<ul class="breadcrumb">
				<li class="active btn btn-primary btn-xs" style="background: #1D2841;">
					<a href="#" style="color: #ddd;">
						<i class="icon-plus3"></i> Update Spice Level
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
						<form action="{{url('spicelevel/'.$editData->id)}}"class="form-horizontal form-validate-jquery" method="post" enctype="multipart/form-data">
							{{method_field('patch')}}
							{{ csrf_field() }}
							<fieldset class="content-group">
								<!-- Write Your Code Here -->
							{{ csrf_field() }}


							<!-- Form Input Field -->
								<div class="form-group">
									<label class="control-label col-lg-3"> Name <span class="text-danger">*</span></label>
									<div class="col-lg-9">
										<input type="text" name="fld_name" value="{{ $editData->fld_name }}" placeholder=" Name" class="form-control">
									</div>
								</div>

								<!-- Form Input Field -->
								<div class="form-group">
									<label class="control-label col-lg-3">Chili Icon <span class="text-danger">*</span></label>
									<div class="col-lg-9">
										<input type="file" name="chili_icon" accept="image/*" class="form-control">
										<input type="hidden" value="{{$editData->fld_chili_icon}}" name="fld_chili_icon">
									</div>
								</div>

								<!-- Form Input Field -->
								<div class="form-group" style="display: none;">
									<label class="control-label col-lg-3">Spice Level <span class="text-danger"></span></label>
									<div class="col-lg-9">
										<select name="fld_spice_level" class="form-control">
											<option>
												{{$editData->fld_spice_level}}
											</option>
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
								<div class="form-group" style="display: none;">
									<label class="control-label col-lg-3">Image / Icon <span class="text-danger">*</span></label>
									<div class="col-lg-8">
										<input type="file" name="icon_image" accept="image/*" class="form-control">
										<input type="hidden" value="{{$editData->fld_icon_image}}" name="fld_icon_image">
									</div>
								</div>


							</fieldset>

							<div class="text-right">
								<button type="submit" class="btn btn-success">Update <i class="icon-arrow-right14 position-right"></i></button>
							</div>

						</form>
					</div>

				</div>
			</div>

			<!-- /main page sources -->
		</div>
		<!-- /main content -->
	</div>
</div>

@include('BackEnd.ajax_request')
