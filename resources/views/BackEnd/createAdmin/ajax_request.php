<script type="text/javascript">
// Insert Admin==========================
$('#InsertAdmin').on('click', function () {
  var Fname = $('#Fname').val();
  var userName = $('#username').val();
  var pass  = $('#password').val();
  var rpass = $('#repeat_password').val();
  if(Fname == ""){
    $('#fNameReq').html("Please Specify Full Name");
    return false;
  }  else{$('#emReq').html("");}
  if(userName == ""){
    $('#unReq').html("Please Specify User Name");
    return false;
  }  else{$('#unReq').html("");}
  if(pass == ""){
    $('#pReq').html("Please Specify Password");
    return false;
  }  else{$('#pReq').html("");}
  if(rpass == ""){
    $('#rpReq').html("Please Specify Re-Password");
    return false;
  }  else{$('#rpReq').html("");}
  $.ajax({
    type:'post',
    url: '/Admin',
    data:$('#AdminFrom').serialize(),
    dataType: "JSON",
    success: function(data)
    {
      if(data.success){
        successMessage(data.success);
      }
      if(data.validation){ 
        var msg =""; 
        $.each( data.validation, function( key, value ) {
            msg += value+"\n";
        });
        validationMessage(msg);
      }
      if(data.error){ 
        errorMessage(data.error);
      }
    }
  });
});


//Update Admin===================
$('#updateAdmin').on('click', function () {
  var id = $('#idd').val();
  $.ajax({
    type:'patch',
    url: '/Admin/'+id,
    data:$('#updateAdminForm').serialize(),
    dataType: "JSON",
    success: function(data)
    {
      if(data.success){
        successMessage(data.success);
        redirectPage();
      }
      if(data.validation){ 
        validationMessage(data.validation);
      }
      if(data.error){ 
        errorMessage(data.error);
      }
    }
  });
});

function redirectPage() {
  window.location.href = '/Admin/create';
}


// Delete Admin========================
function deleteAdmin(id)
{
  var id = id;
  swal({
    text: "Are you sure want to delete this data ?",
    icon: "warning",
    buttons: true,
  })
  .then((willDelete) => {
    if (willDelete) {
      $.ajax({
        type:'delete',
        url: '/Admin/'+id,
        data:$('#deleteForm').serialize(),
        dataType: "JSON",
        success: function(data)
        {
          if(data.success){
            successMessage(data.success);
          }
          if(data.error){ 
            errorMessage(data.error);
          }
        }
      });
    }
  });
}
  


// Define Access========================
$('#UpdateAccess').on('click', function () {
  var id = $('#idd').val();
  swal({
    text: "Are you sure want to access this admin ?",
    icon: "warning",
    buttons: true,
    dangerMode: true,
  })
  .then((willDelete) => {
    if (willDelete) {
      $.ajax({
        type:'post',
        url: '/DefineAccess/'+id,
        data:$('#AccessForm').serialize(),
        dataType: "JSON",
        success: function(data)
        {
          if(data.success){
            successMessage(data.success);
          }
          if(data.error){ 
            errorMessage(data.error);
          }
        }
      });
    }
  });
});


</script>
