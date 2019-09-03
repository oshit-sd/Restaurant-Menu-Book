@include('BackEnd.dashboard.partials.header_css_js')
@include('error_success_msg')

<style type="text/css">
  .titles{
    font-size: 24px;
    font-family: Lobster;
    font-weight: bold;
    font-style: normal;
    color: #045aa7;
    text-shadow: 1px 4px 10px #ddd;
    text-transform: capitalize;
    text-align: center;
    font-variant: small-caps;
  }
</style>
<body class="bg-slate-800">
  <!-- Page container -->
  <div class="page-container login-container">

    <!-- Page content -->
    <div class="page-content">

      <!-- Main content -->
      <div class="content-wrapper">

        <!-- Content area -->
        <div class="content">

          <!-- Advanced login -->
          <form method="POST" action="{{ route('admin.login.submit') }}">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          {{ csrf_field() }}

            <div class="panel panel-body login-form">
              <div class="text-center">
                <!-- <div class="icon-object border-warning-400 text-warning-400">
                  <i class="icon-lock2"></i>
                </div> -->

                <div>
                  <img src="{{ asset('assets/logo/logo.png') }}" style="height: 80px; width: 280px;">
                </div>


                <h5 class="content-group-lg"><strong class="titles">eMENU</strong> <small class="display-block" style="color:#ec0a0a; font-size: 13px;">Login For Administrator</small></h5>
              </div>

              <div class="form-group has-feedback has-feedback-left">
                <input type="text" name="username" value="{{ old('username') }}" required="required" class="form-control" placeholder="Enter Your Username" >
                <div class="form-control-feedback">
                  <i class="icon-user text-muted"></i>
                </div>
              </div>

              <div class="form-group has-feedback has-feedback-left">
                <input type="password" name="password" required="required" class="form-control" placeholder="Enter Your Password">
                <div class="form-control-feedback">
                  <i class="icon-lock2 text-muted"></i>
                </div>
              </div>


              <div class="form-group login-options" style="margin-top: 15px;margin-bottom: 15px;"> 
                <div class="row">
                  <div class="col-sm-6">
                    <label class="checkbox-inline">
{{--                      <input type="checkbox" class="styled" checked="checked">--}}
{{--                      Remember--}}
                    </label>
                  </div>

                  <div class="col-sm-6 text-right">
                    <!-- <a href="#">Forgot password?</a> -->
                  </div>
                </div>
              </div>

              <div class="form-group">
                <button type="submit" class="btn bg-success btn-block">Login <i class="icon-circle-right2 position-right"></i></button>
              </div>

            </div>
          <form>
          <!-- /advanced login -->


    </div>
</div>
<iframe src="{{ asset('assets/camfordTone.mp3') }}" allow="autoplay" style="display: none;">