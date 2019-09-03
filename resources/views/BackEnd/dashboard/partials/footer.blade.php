<script type="text/javascript">
  $('input,select').keydown(function(e) {
    if (e.keyCode == 13) {
      var index = $('input,select').index(this) + 1;
      $('input,select').eq(index).focus();
    }
  });


  // Ajax loading===========
  $(document).ajaxStart(function() {
    $('#loader').show();
  }).ajaxStop(function() {
    $('#loader').hide();
  });

  // browser loading=======
  // window.onload = function(){ document.getElementById("loading").style.display = "none" }


  //Get District===================
  $('#getDistrict').on('change', function() {
    var id = $('#getDistrict').val();
    $.ajax({
      type: 'GET',
      url: '/getDistricts/' + id,
      dataType: "HTML",
      success: function(data) {
        $('#showDistrict').html(data);
        $('.select2ID').select2();
      }
    });
  });

  function validationCheck() {
    var isvalid = true;
    $('#Form :input[required], select[required]').each(function() {
      var id = this.id;
      if (this.value.trim() === '') {
        $(this).css('border', '1px solid red');
        $('#s2id_' + id + '>a').css('border', '1px solid red');
        isvalid = false;
      } else {
        $(this).css('border', '1px solid #23bdbb');
        $('#s2id_' + id + '>a').css('border', '1px solid #23bdbb');
      }
    });

    return isvalid;
  }

  // Live Search DataTable===============
  $("#key").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $(".Search tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
</script>


<!-- Footer -->
<div class="footer text-muted" style="float: left; width: 80%;">
  <div style="width: 70%; float: left;">
    &copy; 2019. <a><b>eMenu Admin Panel</b></a>
  </div>

  <div style="width: 30%; float: left; text-align: right; padding-right: 20px;">
    Developed By: <a href="http://oshit.totbd.net/" target="_blank"> <b>TOiRE</b></a>
  </div>
</div>
<!-- /footer -->

</div>
<!-- /content area -->

</div>
<!-- /main content -->

</div>
<!-- /page content -->

</div>
<!-- /page container -->

</body>

</html>