
  $(function () {
    $("#datepicker1").datepicker({ 
          autoclose: true, 
          todayHighlight: true
    }).datepicker('update', new Date());
  });

  $(function () {
    $(".datePicker").datepicker({ 
          autoclose: true, 
          todayHighlight: true,
          format: "yyyy-mm-dd",
    }).datepicker('update', new Date());
  });


  $(function () {
    $(".datepicker3").datepicker({ 
        autoclose: true, 
        todayHighlight: true,
        format: "yyyy",
        viewMode: "years", 
        minViewMode: "years"
    }).datepicker('update', new Date());
  });

