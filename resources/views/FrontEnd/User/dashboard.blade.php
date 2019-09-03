@extends('layouts.masterFrontend')
@section('content')

    <div class="row">

      <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4 colDiv">
        <a  href="{{url('/Menu')}}">
      	<div class="row special-grid product-grid myGrid">
          <img class="img-responsive imgGrid"
                         src="{{asset('upload_file/home_icon/orders.png')}}" alt="Order" />
        <div class="gridText">
            Orders
        </div>
        </div>
        </a>
      </div>

      <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4 colDiv">
        <a  href="{{url('/table-management')}}">
      	<div class="row special-grid product-grid myGrid">
          <img class="img-responsive imgGrid"
                         src="{{asset('upload_file/home_icon/table.png')}}" alt="Tables" />
        <div class="gridText">
            Table Mangement
        </div>
        </div>
        </a>
      </div>

      <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4 colDiv">
        <a  href="{{url('/Menu')}}">
      	<div class="row special-grid product-grid myGrid">
          <img class="img-responsive imgGrid"
                         src="{{asset('upload_file/home_icon/invoice.png')}}" alt="Invoice" />
        </div>
        <div class="gridText">
            Invoice
        </div>
        </a>
      </div>

      <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4 colDiv">
        <a  href="{{url('/Menu')}}">
      	<div class="row special-grid product-grid myGrid">
          <img class="img-responsive imgGrid"
                         src="{{asset('upload_file/home_icon/payments.png')}}" alt="Payments" />
        </div>
        <div class="gridText">
            Payments
        </div>
        </a>
      </div>

      <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4 colDiv">
        <a  href="{{url('/Menu')}}">
      	<div class="row special-grid product-grid myGrid">
          <img class="img-responsive imgGrid"
                         src="{{asset('upload_file/home_icon/about.png')}}" alt="End of the Day" />
        </div>
        <div class="gridText">
            End of the Day
        </div>
        </a>
      </div>

      <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4 colDiv">
        <a  href="{{url('/Menu')}}">
      	<div class="row special-grid product-grid myGrid">
          <img class="img-responsive imgGrid"
                         src="{{asset('upload_file/home_icon/printer.png')}}" alt="Printer Setting" />
        </div>
        <div class="gridText">
            Printer Setting
        </div>
        </a>
      </div>

      <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4 colDiv">
        <a  href="{{url('/Menu')}}">
      	<div class="row special-grid product-grid myGrid">
          <img class="img-responsive imgGrid"
                         src="{{asset('upload_file/home_icon/frontendSetting.png')}}" alt="Front End Setting" />
        </div>
        <div class="gridText">
            Front End Setting
        </div>
        </a>
      </div>

      <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4 colDiv">
        <a  href="{{url('/Menu')}}">
      	<div class="row special-grid product-grid myGrid">
          <img class="img-responsive imgGrid"
                         src="{{asset('upload_file/home_icon/rest_menu.png')}}" alt="Restaurant Menu Mangement" />
        </div>
        <div class="gridText2">
            Restaurant Menu Mangement
        </div>
        </a>
      </div>

      <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4 colDiv">
        <a  href="{{url('/Menu')}}">
      	<div class="row special-grid product-grid myGrid">
          <img class="img-responsive imgGrid"
                         src="{{asset('upload_file/home_icon/user_manage.png')}}" alt="User Mangement" />
        </div>
        <div class="gridText">
            User Mangement
        </div>
        </a>
      </div>

      <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4 colDiv">
        <a  href="{{url('/Menu')}}">
      	<div class="row special-grid product-grid myGrid">
          <img class="img-responsive imgGrid"
                         src="{{asset('upload_file/home_icon/setting.png')}}" alt="Setting" />
        </div>
        <div class="gridText">
            Setting
        </div>
        </a>
      </div>

      <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4 colDiv">
        <a  href="{{url('/Menu')}}">
      	<div class="row special-grid product-grid myGrid">
          <img class="img-responsive imgGrid"
                         src="{{asset('upload_file/home_icon/debtors.png')}}" alt="Debtors" />
        </div>
        <div class="gridText">
            Debtors
        </div>
        </a>
      </div>

      <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4 colDiv">
        <a  href="{{url('/Menu')}}">
      	<div class="row special-grid product-grid myGrid">
          <img class="img-responsive imgGrid"
                         src="{{asset('upload_file/home_icon/reports.png')}}" alt="Reports" />
        </div>
        <div class="gridText">
            Reports
        </div>
        </a>
      </div>

      <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4 colDiv">
        <a  href="{{url('/Menu')}}">
      	<div class="row special-grid product-grid myGrid">
          <img class="img-responsive imgGrid"
                         src="{{asset('upload_file/home_icon/restaurant_opt.png')}}" alt="Restaurant Operation" />
        </div>
        <div class="gridText">
            Restaurant Operation
        </div>
        </a>
      </div>

      <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4 colDiv">
        <a  href="{{url('/Menu')}}">
      	<div class="row special-grid product-grid myGrid">
          <img class="img-responsive imgGrid"
                         src="{{asset('upload_file/home_icon/tax_fees.png')}}" alt="Taxs & Fees" />
        </div>
        <div class="gridText">
            Taxs & Fees
        </div>
        </a>
      </div>

    </div>
@stop