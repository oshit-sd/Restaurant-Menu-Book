
<!-- Success Message -->
@if(Session::has('success'))
<span style="display: none;">.</span>
<script type="text/javascript">
  swal({
    text: "{{Session::get('success')}} ",
    icon: "success",
    buttons: false,
    timer: 1000,
  }); 
  $(".swal-overlay").css('background-color','rgba(43, 165, 137, 0.45)');
  $(".swal-button").css('background-color','#4962B3');
  $(".swal-button").css('padding','7px 20px');
  $(".swal-footer").css('background-color','rgb(245, 248, 250)');
  $(".swal-footer").css('border-top','1px solid #E9EEF1');
  $(".swal-footer").css('overflow','hidden');
  $(".swal-footer").css('margin-top','32px');
  $(".swal-text").css('color','green');
</script>
@endif


<!-- Validation Message -->
@if($errors->any())

  <?php $validation = ""; ?>
  @foreach($errors->all() as $er)
    <?php $validation .= $er.'\n'; ?> 
  @endforeach

    <span style="display: none;">.</span>
    <script type="text/javascript">
      swal({
          text: "{{$validation}}",
          icon: "error",
          showCancelButton: false,
          dangerMode: true,
        });
        $(".swal-overlay").css('background-color','rgba(202, 68, 88, 0.41)');
        $(".swal-footer").css('background-color','rgb(245, 248, 250)');
        $(".swal-button").css('padding','7px 20px');
        $(".swal-footer").css('border-top','1px solid #E9EEF1');
        $(".swal-footer").css('overflow','hidden');
        $(".swal-footer").css('margin-top','32px');
        $(".swal-text").css('color','red');
    </script>
@endif


<!-- Error Message -->
@if(Session::has('errorMsg'))
<span style="display: none;">.</span>
<script type="text/javascript">
  swal({
      text: "{{Session::get('errorMsg')}}",
      icon: "error",
      showCancelButton: false,
      dangerMode: true,
    });
    $(".swal-overlay").css('background-color','rgba(202, 68, 88, 0.41)');
    $(".swal-footer").css('background-color','rgb(245, 248, 250)');
    $(".swal-button").css('padding','7px 20px');
    $(".swal-footer").css('border-top','1px solid #E9EEF1');
    $(".swal-footer").css('overflow','hidden');
    $(".swal-footer").css('margin-top','32px');
    $(".swal-text").css('color','red');
</script>
@endif



<!-- Success && Error && validation Message -->
<script type="text/javascript">
  function successMessage(data) {
    swal({
      text: data,
      icon: "success",
      buttons: false,
      timer: 1000,
    })
    $(".swal-overlay").css('background-color','rgba(43, 165, 137, 0.45)');
    // $(".swal-button").css('background-color','#4962B3');
    // $(".swal-button").css('padding','7px 20px');
    // $(".swal-footer").css('background-color','rgb(245, 248, 250)');
    // $(".swal-footer").css('border-top','1px solid #E9EEF1');
    // $(".swal-footer").css('overflow','hidden');
    // $(".swal-footer").css('margin-top','32px');
    $(".swal-text").css('color','green');
    setTimeout(function() {$.fancybox.close()}, 500);
    setTimeout( function() {location.reload();}, 1020);
  }  

  // Error Message
  function errorMessage(data) {
    swal({
      text: data,
      icon: "error",
      showCancelButton: false,
      dangerMode: true,
    });
    $(".swal-overlay").css('background-color','rgba(202, 68, 88, 0.41)');
    $(".swal-footer").css('background-color','rgb(245, 248, 250)');
    $(".swal-button").css('padding','7px 20px');
    $(".swal-footer").css('border-top','1px solid #E9EEF1');
    $(".swal-footer").css('overflow','hidden');
    $(".swal-footer").css('margin-top','32px');
    $(".swal-text").css('color','red');
  }  

  // Validation Message
  function validationMessage(data) {
    swal({
      text: data,
      icon: "warning",
      showCancelButton: false,
      dangerMode: true,
    });
    $(".swal-overlay").css('background-color','rgba(202, 68, 88, 0.41)');
    $(".swal-footer").css('background-color','rgb(245, 248, 250)');  
    $(".swal-button").css('padding','7px 20px');
    $(".swal-footer").css('border-top','1px solid #E9EEF1');
    $(".swal-footer").css('overflow','hidden');
    $(".swal-footer").css('margin-top','32px');
    $(".swal-text").css('color','red');
  }

  function chartsMessage(data) {
    swal({
      text: data,
      showCancelButton: false,
    })
    $(".swal-overlay").css('background-color','rgba(43, 165, 137, 0.45)');
    $(".swal-button").css('background-color','#4962B3');
    $(".swal-button").css('padding','7px 20px');
    $(".swal-footer").css('background-color','rgb(245, 248, 250)');
    $(".swal-footer").css('border-top','1px solid #E9EEF1');
    $(".swal-footer").css('overflow','hidden');
    $(".swal-footer").css('margin-top','32px');
    $(".swal-text").css('color','#4f4fbd');
  } 
</script>
