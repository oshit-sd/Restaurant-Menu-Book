@extends('BackEnd.adminMaster')
@section('RestaurantSetting', 'active')
@section('content')

@if($count == 0)
<form id="Form" method="post" action="{{url('/RestaurantSetting')}}" enctype="multipart/form-data" class="form-horizontal">
    @elseif($count == 1)
    <form id="Form" method="post" action="{{url('/RestaurantSetting/'.$data->id)}}" enctype="multipart/form-data" class="form-horizontal">
        @endif
        {{csrf_field()}}

        <div class="col-lg-6">
            <!-- Form Input Field -->
            <div class="form-group">
                <label class="control-label col-lg-3">Restaurant Name <span class="text-danger"></span></label>
                <div class="col-lg-8">
                    <input type="text" name="fld_name" value="{{isset($data->fld_name)?$data->fld_name:''}}" required placeholder="Restaurant Name" class="form-control">
                </div>
            </div>
            <!-- Form Input Field -->
            <div class="form-group">
                <label class="control-label col-lg-3">Logo <span class="text-danger"></span></label>
                <div class="col-lg-8">
                    <input type="file" name="fld_logo" class="form-control">
                    <input type="hidden" value="{{isset($data->fld_logo)?$data->fld_logo:''}}" name="old" class="form-control">
                </div>
            </div>
            <!-- Form Input Field -->
            <div class="form-group">
                <label class="control-label col-lg-3">Registration No. <span class="text-danger"></span></label>
                <div class="col-lg-8">
                    <input type="text" name="fld_reg_number" value="{{isset($data->fld_reg_number)?$data->fld_reg_number:''}}" placeholder="Registration No." class="form-control">
                </div>
            </div>
            <!-- Form Input Field -->
            <div class="form-group">
                <label class="control-label col-lg-3">Tel. <span class="text-danger"></span></label>
                <div class="col-lg-8">
                    <input type="text" name="fld_phone" value="{{isset($data->fld_phone)?$data->fld_phone:''}}" placeholder="Tel." class="form-control">
                </div>
            </div>
            <!-- Form Input Field -->
            <div class="form-group">
                <label class="control-label col-lg-3">Email <span class="text-danger"></span></label>
                <div class="col-lg-8">
                    <input type="email" name="fld_email" value="{{isset($data->fld_email)?$data->fld_email:''}}" placeholder="Email" class="form-control">
                </div>
            </div>
            <!-- Form Input Field -->
            <div class="form-group">
                <label class="control-label col-lg-3">House No. <span class="text-danger"></span></label>
                <div class="col-lg-8">
                    <input type="text" name="fld_house_number" value="{{isset($data->fld_house_number)?$data->fld_house_number:''}}" placeholder="House No." class="form-control">
                </div>
            </div>
            <!-- Form Input Field -->
            <div class="form-group">
                <label class="control-label col-lg-3">Zip Code <span class="text-danger"></span></label>
                <div class="col-lg-8">
                    <input type="text" name="fld_zip" value="{{isset($data->fld_zip)?$data->fld_zip:''}}" placeholder="Zip Code" class="form-control">
                </div>
            </div>
            <!-- Form Input Field -->
            <div class="form-group">
                <label class="control-label col-lg-3">Vat ID <span class="text-danger"></span></label>
                <div class="col-lg-8">
                    <input type="text" name="fld_vat_id" value="{{isset($data->fld_vat_id)?$data->fld_vat_id:''}}" placeholder="Vat ID" class="form-control">
                </div>
            </div>
            <!-- Form Input Field -->
            <div class="form-group">
                <label class="control-label col-lg-3">Address <span class="text-danger"></span></label>
                <div class="col-lg-8">
                    <textarea name="fld_address" rows="3" placeholder="Address" class="form-control">{{isset($data->fld_address)?$data->fld_address:''}}</textarea>
                </div>
            </div>

        </div>

        <div class="col-lg-6">

            <!-- Form Input Field -->
            <div class="form-group">
                <label class="control-label col-lg-3">City <span class="text-danger"></span></label>
                <div class="col-lg-8">
                    <input type="text" name="fld_city" value="{{isset($data->fld_city)?$data->fld_city:''}}" placeholder="City" class="form-control">
                </div>
            </div>
            <!-- Form Input Field -->
            <div class="form-group">
                <label class="control-label col-lg-3">Country <span class="text-danger"></span></label>
                <div class="col-lg-8">
                    <input type="text" name="fld_country" value="{{isset($data->fld_country)?$data->fld_country:''}}" placeholder="Country" class="form-control">
                </div>
            </div>
            <!-- Form Input Field -->
            <div class="form-group">
                <label class="control-label col-lg-3">Fax <span class="text-danger"></span></label>
                <div class="col-lg-8">
                    <input type="text" name="fld_fax" value="{{isset($data->fld_fax)?$data->fld_fax:''}}" placeholder="Fax" class="form-control">
                </div>
            </div>
            <!-- Form Input Field -->
            <div class="form-group">
                <label class="control-label col-lg-3">Web <span class="text-danger"></span></label>
                <div class="col-lg-8">
                    <input type="text" name="fld_web" value="{{isset($data->fld_web)?$data->fld_web:''}}" placeholder="Web" class="form-control">
                </div>
            </div>
            <!-- Form Input Field -->
            <div class="form-group">
                <label class="control-label col-lg-3">Currency <span class="text-danger"></span></label>
                <div class="col-lg-8">
                    <?php
                    isset($data->fld_currency) ? $cur  = $data->fld_currency : $cur = '';
                    ?>
                    <select name="fld_currency" class="form-control">
                        <option {{ ($cur == '$') ? 'selected' : '' }}>$</option>
                        <option {{ ($cur == '€') ? 'selected' : '' }}>€</option>
                        <option {{ ($cur == '£') ? 'selected' : '' }}>£</option>
                        <option {{ ($cur == 'TK') ? 'selected' : '' }}>TK</option>
                    </select>
                </div>
            </div>

            <!-- Form Input Field -->
            <div class="form-group">
                <label class="control-label col-lg-3">Message <span class="text-danger"></span></label>
                <div class="col-lg-8">
                    <textarea name="fld_message" rows="5" placeholder="Message" class="form-control">{{isset($data->fld_message)?$data->fld_message:''}}</textarea>
                </div>
            </div>

            <div class="form-group">
                <div class="col-lg-3"></div>
                <div class="col-lg-5">
                    @if($count == 0)
                    <button type="submit" class="btn btn-primary">Submit <i class="icon-arrow-right14 position-right"></i></button>
                    @elseif($count == 1)
                    <button type="submit" class="btn btn-success">Update <i class="icon-arrow-right14 position-right"></i></button>
                    @endif
                </div>
                <div class="col-lg-2">
                    @if(isset($data->fld_logo))
                    <img src="{{ asset('upload_file/logo/'.$data->fld_logo) }}" style="height: 80px; width: 80px; margin-left: 25px;">
                    @endif
                </div>
            </div>

            <div class="text-center" style="margin-top: 15px;">



            </div>
        </div>

    </form>
    </div>
    </div>

    <!-- /main page sources -->
    </div>
    </div>
    </div>
    @endsection