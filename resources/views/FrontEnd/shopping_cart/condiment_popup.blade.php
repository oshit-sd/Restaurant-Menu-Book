<div class="carList">
	<!-- Header Section  -->
	<div style="width: 97%;">
		<h3><b><i class="fa fa-cart-plus"></i> {{isset($title)?$title:""}}</b></h3>
		<hr>
	</div>

	<!-- Body Section -->
	<div style="width: 97%;">
		<form method="POST" id="condiments-form">
			@csrf
			<input type="hidden" name="menuID" class="menuID" value="{{$menuID}}">
			<input type="hidden" name="categoryID" class="cateID" value="{{$categoryID}}">

			@foreach($condimentGroup as $condG)
			<label style="padding: 10px;">
				<b>{{$condG->fld_name}}</b>
				<span style="color: red">*</span>
			</label>

			<div style="margin-left: 40px;">
				@foreach($condG->condiments as $condName)
				<label class="container-checkbox">
					<input type="checkbox" name="condiments[{{ $qty }}][{{ $condG->id }}][]" value="{{$condName->id}}" />
					{{$condName->fld_condiment_name}}
					<span class="checkmark"></span>
				</label>
				@endforeach
			</div>
			<hr>
			@endforeach

			<a href="" class="btn btn-danger aBtn">Cancel</a>

			<button type="button" class="btn btn-success btn-sm bbttn add-to-cart-with-condiments">Add to
				Cart</button>
		</form>
	</div>
</div>

<!-- preparation condiment Js -->
<script src="{{ asset('assets/FrontEnd/js/preparation_condiment.js') }}"></script>

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