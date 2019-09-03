<!DOCTYPE html>
<html lang="en">

<head>
  <title>{{isset($title)?$title:"eMenu"}}</title>
  <link rel="shortcut icon" href="{{ asset('assets/FrontEnd/image/logo-title.png')}}">
  <link rel="apple-touch-icon" href="{{ asset('assets/FrontEnd/image/logo-title.png')}}">

  <meta http-equiv="content-type" content="text/html;charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="e-commerce site well design with responsive view." />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">


  <!-- Header CSS & JS -->
  @include('layouts.partialsFrontend.header_css_js')

</head>

<body class="category col-2 left-col">
  <!-- <div class="preloader loader" style="display: block; background:#f2f2f2;"> 
    <img src="{{ asset('assets/FrontEnd/image/loader.gif')}}" alt="loader" />
  </div> -->

  <!--Header Navigation-->
  @include('layouts.partialsFrontend.header_navigation')

  <div class="container">
    <ul class="breadcrumb">
      @if(!empty($pageTitle))
      @foreach($pageTitle as $key => $pTitle)
      @if($key == 0)
      <li><a href="{{ url($pTitle[0]) }}"><i class="fa fa-home"></i></a></li>
      @else
      <li><a href="{{ url($pTitle[0]) }}">{{ $pTitle[1] }}</a></li>
      @endif
      @endforeach
      @endif
    </ul>

    <!-- Main Content -->
    <div class="mainContent">
      @yield('content')
    </div>

  </div>

  <!-- Footer -->
  @include('layouts.partialsFrontend.footer')
  @include('error_success_msg')
</body>

</html>