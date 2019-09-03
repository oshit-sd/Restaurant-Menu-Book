<div class="carList">

	<!-- Header Section -->
	<div style="width: 97%;">
		<h3><b><i class="fa fa-cart-plus"></i> {{isset($title)?$title:""}}</b></h3>
		<hr>
	</div>

	<!-- Body Section -->
	<div style="width: 97%;">
		<form method="POST" id="preparation-form">
			@csrf
			<input type="hidden" name="menuID" class="menuID" value="{{$menuID}}">
			<input type="hidden" name="qty" class="qty" value="{{$qty}}">
			<input type="hidden" name="categoryID" class="cateID" value="{{$categoryID}}">

			@foreach($preparationGroup as $preG)
			<label style="padding: 10px;">
				<b>{{$preG->fld_name}}</b>
				<span style="color: red">*</span>
			</label>

			<div style="margin-left: 40px;">
				@foreach($preG->preparation as $preName)
				<label class="container-checkbox">
					<input type="checkbox" class="preparation" name="preparation[{{ $qty }}][{{ $preG->id }}][]" value="{{$preName->id}}" />
					{{$preName->fld_name}}
					<span class="checkmark"></span>
				</label>
				@endforeach
			</div>
			<hr>
			@endforeach

			<a href="" class="btn btn-danger aBtn">Cancel</a>
			@if($condiment == 1)
			<button type="button" class="btn btn-success btn-sm bbttn preparation-next">Next</button>

			@else
			<button type="button" class="btn btn-success btn-sm bbttn add-to-cart-with-preparation">Add to
				Cart</button>
			@endif
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