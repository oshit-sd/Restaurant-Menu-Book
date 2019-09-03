<script type="text/javascript">
    $('.InsertForm').submit(function(e) {
        e.preventDefault();
        var check = validationCheck();
        var InsertUrl = $("#Url").val();
        if (check) {
            $.ajax({
                type: 'POST',
                url: InsertUrl,
                data: new FormData(this),
                dataType: "JSON",
                contentType: false,
                processData: false,
                success: function(data) {
                    if (data.success) {
                        successMessage(data.success);
                    }
                    if (data.validation) {
                        var msg = "";
                        $.each(data.validation, function(key, value) {
                            msg += value + "\n";
                        });
                        validationMessage(msg);
                    }
                    if (data.error) {
                        errorMessage(data.error);
                    }
                }
            });
        }
    });



    //Update===================
    $('#UpdateData').on('click', function() {
        var id = $('#idd').val();
        var UpdateUrl = $("#Url").val();
        $.ajax({
            type: 'patch',
            url: UpdateUrl + '/' + id,
            data: $('#updateForm').serialize(),
            dataType: "JSON",
            success: function(data) {
                if (data.success) {
                    successMessage(data.success);
                }
                if (data.validation) {
                    var msg = "";
                    $.each(data.validation, function(key, value) {
                        msg += value + "\n";
                    });
                    validationMessage(msg);
                }
                if (data.error) {
                    errorMessage(data.error);
                }
            }
        });
    });



    // Delete Data========================
    function deleteData(id) {
        swal({
                text: "Are you sure want to delete this data ?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    var DeleteUrl = $("#Url").val();
                    $.ajax({
                        type: 'delete',
                        url: DeleteUrl + '/' + id,
                        data: $('#deleteForm').serialize(),
                        dataType: "JSON",
                        success: function(data) {
                            if (data.success) {
                                successMessage(data.success);
                            }
                            if (data.error) {
                                errorMessage(data.error);
                            }
                        }
                    });
                }
            });
    }



    // Remove Relations========================
    function removeRelations(portion) {
        swal({
                text: "Are you sure want to remove this ?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    id = $("." + portion + "_id").val();
                    var RemoveUrl = $("#URL_" + portion).val();
                    // alert(RemoveUrl);
                    // return false;
                    var editID = $("#editID").val();
                    $.ajax({
                        type: 'get',
                        url: RemoveUrl + id + '/' + editID,
                        // data:{id:id},
                        dataType: "JSON",
                        success: function(data) {
                            if (data.success) {
                                successMessage(data.success);
                            }
                            if (data.error) {
                                errorMessage(data.error);
                            }
                        }
                    });
                }
            });
    }



    // Chekbox Value Change========================
    function checkboxValue(id) {
        if ($(".check_" + id).prop('checked') == true) {
            $(".check_" + id).val(1);
        } else {
            $(".check_" + id).val(0);
        }
    }
</script>