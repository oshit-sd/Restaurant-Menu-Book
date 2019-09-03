@extends('BackEnd.adminMaster')
@section('activeDasboard', 'active')
@section('content')

<div class="col-lg-5">
	<img src="{{ asset('assets/logo/game.png') }}" style="width: 100%; height: 170px;">
</div>
<div class="col-lg-7">
	@include('BackEnd.dashboard.partials.animate')
</div>


</div>
</div>
</div>


@endsection
