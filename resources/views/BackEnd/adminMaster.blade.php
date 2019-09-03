@include('BackEnd.dashboard.partials.header_css_js')
<!-- Processing Image -->
<div hidden id="loader" style="position: fixed; z-index: 1000; margin: auto; height: 100%; width: 100%; background:rgba(212, 241, 237, 0.68);">
  <img src="{{ asset('assets/BackEnd/loader.gif') }}" style="top: 40%; left: 50%; opacity: 1; position: fixed; height: 100px;">
</div>


<!-- broswe loading image -->
<!-- <style type="text/css">
  #loading {width: 100%;height: 100%;top: 0px;left: 0px;position: fixed;display: block; z-index: 99; background:rgba(255, 255, 255, 0.72);}
  #loading-image {position: absolute;top: 30%;left: 50%;z-index: 100; height: 120px;} 
</style> -->

<!-- <div id="loading">
  <img id="loading-image" src="{{ asset('assets/BackEnd/br_loader.gif') }}" alt="Loading..." />
</div> -->


@include('error_success_msg')

<body>
  <!-- Header Navigation -->
  @include('BackEnd.dashboard.partials.header_navigation')

  <!-- Page container -->
  <div class="page-container">

    <!-- Page content -->
    <div class="page-content">

      <!-- Main sidebar -->
      <div class="sidebar sidebar-main">
        <div class="sidebar-content">

          @include('BackEnd.dashboard.partials.left_sidebar_navigation')

        </div>
      </div>
      <!-- /main sidebar -->

      <!-- Main content -->
      <div class="content-wrapper">
        <div class="page-header">
          <div class="breadcrumb-line">
            <!-- style="background: #276184db;" -->
            <ul class="breadcrumb">
              <li>
                <a href="{{ url('/admin') }}" class="btn btn-primary btn-xs" style="color: #ddd; background: #184C6F;">
                  <i class="icon-home2 position-left"></i> Home
                </a>
              </li>
              <li>
                <a href="{{ Request::getRequestUri() }}" class="btn btn-primary btn-xs" style="color: #ddd;  background: #184C6F;">
                  <i class="icon-graduation2 position-left"></i>
                  @if(isset($title)) {{$title}} @endif &nbsp;
                </a>
              </li>
            </ul>
          </div>
        </div>
        <!-- /page header -->

        <!-- Content area -->
        <div class="content" style="">
          <!-- Main content -->
          <div class="row">
            <div class="col-lg-12">

              <!-- main page sources -->
              <div class="panel panel-flat panel-color">
                <!-- <div class="panel-heading" style="background: #b5ece5;">
                      <div class="heading-elements">
                        <ul class="icons-list">
                          <li><a data-action="collapse"></a></li>
                          <li><a data-action="reload"></a></li>
                          <li><a data-action="close"></a></li>
                        </ul>
                      </div>
                    <a class="heading-elements-toggle"><i class="icon-menu"></i>
                    </a>
                </div> -->
                <div class="panel-body">

                  <!-- Main Content -->
                  @yield('content')
                </div>
              </div>


              @include('BackEnd.ajax_request')

              <!-- Footer -->
              @include('BackEnd.dashboard.partials.footer')