
<div class="col-sm-12" style="width: 550px;">

	<!-- Page header -->
	<div class="page-header">
		<div class="breadcrumb-line">
			<ul class="breadcrumb">
				<li class="active btn btn-primary btn-xs" style="background: #1D2841;"> 
					<a href="#" style="color: #ddd;">
						<i class="icon-plus3"></i> Update Service
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
						<form id="updateForm" class="form-horizontal form-validate-jquery" method="patch">

							<fieldset class="content-group">
								<!-- Write Your Code Here -->
								{{ csrf_field() }}
								<input type="hidden" name="id" id="idd" value="{{ $editData->id }}">

				                <!-- Form Input Field -->
				                <div class="form-group">
				                  <label class="control-label col-lg-4">Service Name <span class="text-danger">*</span></label>
				                  <div class="col-lg-8">
				                      <input type="text" required name="fld_name" required value="{{ $editData->fld_name }}" class="form-control">
				                  </div>
				                </div>


							</fieldset>

							<div class="text-right">
								<button type="button" id="UpdateData" class="btn btn-success">Update <i class="icon-arrow-right14 position-right"></i></button>
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
