<!DOCTYPE html>
<html lang="en">
<html lang="en">

<head>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ (isset($title))? $title : "eMenu" }} | Admin Panel</title>
  <link rel="shortcurt icon" href="{{ asset('assets/logo/title_logo.png') }}" />
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <!-- Sweet Alert Message Box -->
  <script src="{{ asset('assets/BackEnd/sweetAlert_script/sweetalert.min.js') }}"></script>
  <!-- Sweet Alert Message Box End -->

  <!-- /global stylesheets -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
  <link href="{{ asset('assets/BackEnd/assets/css/icons/icomoon/styles.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ asset('assets/BackEnd/assets/css/minified/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ asset('assets/BackEnd/assets/css/minified/core.min.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ asset('assets/BackEnd/assets/css/minified/components.min.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ asset('assets/BackEnd/assets/css/minified/colors.min.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ asset('assets/BackEnd/assets/css/extras/animate.min.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ asset('assets/BackEnd/assets/css/style.css') }}" rel="stylesheet" type="text/css">
  <!-- /global stylesheets -->

  <!-- Core JS files -->
  <script type="text/javascript" src="{{ asset('assets/BackEnd/assets/js/plugins/loaders/pace.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('assets/BackEnd/assets/js/core/libraries/jquery.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('assets/BackEnd/assets/js/core/libraries/bootstrap.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('assets/BackEnd/assets/js/plugins/loaders/blockui.min.js') }}"></script>
  <!-- /core JS files -->
  <!-- <script src="https://code.jquery.com/jquery-3.3.1.js"></script> -->


  <!-- Date Picker files -->
  <script src="{{ asset('assets/BackEnd/assets/datePicker/js/bootstrap-datepicker.js') }}"></script>
  <script src="{{ asset('assets/BackEnd/assets/datePicker/js/date.js') }}"></script>
  <!-- Date Picker files -->


  <!-- Print Page Open Script -->
  <script>
    function printContent(el) {
      var restorepage = document.body.innerHTML;
      var printcontent = document.getElementById(el).innerHTML;
      document.body.innerHTML = printcontent;
      $('.Hide').css("display", "none");
      window.print();
      setTimeout(function() {
        $.fancybox.close()
      }, 1000);
      location.reload();
      document.body.innerHTML = restorepage;
    }
  </script>
  <style type="text/css">
    @media print {

      html,
      body {
        height: auto;
        font-size: 10px;
        /* changing to 10pt has no impact */
      }
    }
  </style>
  <!-- Print Page Open Script -->


  <!-- For Fancy Box -->
  <script type="text/javascript" src="{{ asset('assets/BackEnd/fancyBox/js/jquery.fancybox.js?v=2.1.5 ') }}"></script>
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/BackEnd/fancyBox/css/jquery.fancybox.css?v=2.1.5') }}" media="screen" />
  <script type="text/javascript" src="{{ asset('assets/BackEnd/fancyBox/js/fancybox_design.js') }}"></script>
  <!-- For Fancy Box End -->


  <!-- CK editor -->
  <script type="text/javascript" src="{{ asset('assets/BackEnd/assets/js/plugins/editors/summernote/summernote.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('assets/BackEnd/assets/js/pages/editor_summernote.js') }}"></script>

  <!-- Theme JS files -->
  <script type="text/javascript" src="{{ asset('assets/BackEnd/assets/js/plugins/uploaders/fileinput.min.js') }}"></script>

  <script type="text/javascript" src="{{ asset('assets/BackEnd/assets/js/core/app.js') }}"></script>

  <!-- File Uploader -->
  <script type="text/javascript" src="{{ asset('assets/BackEnd/assets/js/pages/uploader_bootstrap.js') }}"></script>

  <!-- For Data Table -->
  <script type="text/javascript" src="{{ asset('assets/BackEnd/assets/js/plugins/tables/datatables/datatables.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('assets/BackEnd/assets/js/pages/datatables_advanced.js') }}"></script>
  <script type="text/javascript" src="{{ asset('assets/BackEnd/assets/js/pages/datatables_basic.js') }}"></script>
  <!-- Data Table End -->

  <script type="text/javascript" src="{{ asset('assets/BackEnd/assets/js/pages/form_layouts.js') }}"></script>
  <script type="text/javascript" src="{{ asset('assets/BackEnd/assets/js/plugins/forms/validation/validate.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('assets/BackEnd/assets/js/plugins/forms/selects/bootstrap_multiselect.js') }}"></script>
  <script type="text/javascript" src="{{ asset('assets/BackEnd/assets/js/plugins/forms/selects/select2.min.js') }}"></script>

  <script type="text/javascript" src="{{ asset('assets/BackEnd/assets/js/plugins/forms/styling/uniform.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('assets/BackEnd/assets/js/pages/form_validation.js') }}"></script>

  <!-- /theme JS files -->


</head>