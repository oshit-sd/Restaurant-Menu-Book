@extends('layouts.masterFrontend')
@section('content')

<div class="row">

  @foreach($categories as $category)
  @if($category->fld_category == "Food")
  <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4 colDiv">
    <a href="{{url('/category/'.$category->id.'/'.$category->fld_category)}}">
      <div class="row special-grid product-grid myGrid">
        <img class="img-responsive imgGrid" src="{{asset('upload_file/home_icon/food.png')}}" alt="Food" />
      </div>
      <div class="gridText">
        Food
      </div>
    </a>
  </div>

  @elseif ($category->fld_category == "Drinks")
  <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4 colDiv">
    <a href="{{url('/category/'.$category->id.'/'.$category->fld_category)}}">
      <div class="row special-grid product-grid myGrid">
        <img class="img-responsive imgGrid" src="{{asset('upload_file/home_icon/drinks.jpg')}}" alt="Drinks" />
      </div>
      <div class="gridText">
        Drinks
      </div>
    </a>
  </div>
  @else

  <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4 colDiv">
    <a href="{{url('/category/'.$category->id.'/'.$category->fld_category)}}">
      <div class="row special-grid product-grid myGrid">
        <img class="img-responsive imgGrid" src="{{asset('upload_file/home_icon/food-icon.png')}}" alt="img" />
      </div>
      <div class="gridText">
        {{ $category->fld_category }}
      </div>
    </a>
  </div>
  @endif
  @endforeach

  <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4 colDiv">
    <a href="{{url('/my-orders')}}" class="linka fancybox fancybox.ajax">
      <div class="row special-grid product-grid myGrid">
        <img class="img-responsive imgGrid" src="{{asset('upload_file/home_icon/orders.png')}}" alt="img" />
      </div>
      <div class="gridText">
        My Orders
      </div>
    </a>
  </div>

  <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4 colDiv">
    <a href="{{route('Services')}}" class="linka fancybox fancybox.ajax">
      <div class="row special-grid product-grid myGrid">
        <img class="img-responsive imgGrid" src="{{asset('upload_file/home_icon/service.png')}}" alt="img" />
      </div>
      <div class="gridText">
        Service
      </div>
    </a>
  </div>

  <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4 colDiv">
    <a href="{{route('MyBill')}}" class="linka fancybox fancybox.ajax">
      <div class="row special-grid product-grid myGrid">
        <img class="img-responsive imgGrid" src="{{asset('upload_file/home_icon/bill.png')}}" alt="img" />
      </div>
      <div class="gridText">
        My Bill
      </div>
    </a>
  </div>
</div> @stop