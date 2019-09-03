<div class="carList">
	<!-- Header Section -->
	<div style="width: 97%;">
		<h3><b><i class="fa fa-cart-plus"></i>Services </b></h3>
		<hr>
	</div>

	<!-- Body Section -->
	<div style="width: 97%;">
		<form method="POST" id="preparation-form">
			@csrf
			@if($getService)
			@foreach($getService as $service)
			<label class="container-checkbox">
				<input type="checkbox" class="service" name="service[]" value="{{$service->id}}" />
				{{ $service->fld_name }}
				<span class="checkmark"></span>
			</label>
			<hr>
			@endforeach
			@endif

			<a href="" class="btn btn-danger aBtn">Cancel</a>
			<button type="button" class="btn btn-success btn-sm bbttn">Send</button>

		</form>
	</div>
</div>

<style>
	.aBtn {
		padding: 7px 40px;
		font-size: 15px;
	}

	.bbttn {
		padding: 3px 40px;
		font-size: 15px;
	}
</style>