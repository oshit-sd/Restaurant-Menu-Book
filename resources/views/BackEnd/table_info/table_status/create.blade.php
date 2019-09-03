@extends('BackEnd.adminMaster')
@section('ColorPicker', 'active')
@section('content')
    <form id="Form" method="POST"  action="#" class="form-horizontal">
    <div class="col-lg-12">
        <!-- Form Input Field -->
        <div class="form-group">
            <label class="control-label col-lg-2">Vacant <span class="text-danger"></span></label>
            <div class="col-lg-5">
                <input type="color" value="{{(isset($Vacant->color_code)?"#".$Vacant->color_code:'#ffffff')}}" onchange="colorPicker('va')" class="form-control vacant_color_va">
            </div>
            <div class="col-lg-2">
                <input type="text" disabled value="{{(isset($Vacant->color_code)?"#".$Vacant->color_code:'#ffffff')}}" class="form-control vacant_color_va">
            </div>
            <div class="col-lg-2">
                <a onclick="resetColor('va')" class="btn btn-danger btn-xs">Clear</a>
            </div>
        </div>

        <!-- Form Input Field -->
        <div class="form-group">
            <label class="control-label col-lg-2">Reserved <span class="text-danger"></span></label>
            <div class="col-lg-5">
                <input type="color"  value="{{(isset($Reserved->color_code)?"#".$Reserved->color_code:'#ffffff')}}" onchange="colorPicker('rs')" class="form-control vacant_color_rs">
            </div>
            <div class="col-lg-2">
                <input type="text" disabled value="{{(isset($Reserved->color_code)?"#".$Reserved->color_code:'#ffffff')}}" class="form-control vacant_color_rs">
            </div>
            <div class="col-lg-2">
                <a onclick="resetColor('rs')" class="btn btn-danger btn-xs">Clear</a>
            </div>
        </div>

        <!-- Form Input Field -->
        <div class="form-group">
            <label class="control-label col-lg-2">Occupied <span class="text-danger"></span></label>
            <div class="col-lg-5">
                <input type="color"  value="{{(isset($Occupied->color_code)?"#".$Occupied->color_code:'#ffffff')}}" onchange="colorPicker('oc')" class="form-control vacant_color_oc">
            </div>
            <div class="col-lg-2">
                <input type="text" disabled value="{{(isset($Occupied->color_code)?"#".$Occupied->color_code:'#ffffff')}}" class="form-control vacant_color_oc">
            </div>
            <div class="col-lg-2">
                <a onclick="resetColor('oc')" class="btn btn-danger btn-xs">Clear</a>
            </div>
        </div>

        <!-- Form Input Field -->
        <div class="form-group">
            <label class="control-label col-lg-2">Open <span class="text-danger"></span></label>
            <div class="col-lg-5">
                <input type="color" value="{{(isset($Open->color_code)?"#".$Open->color_code:'#ffffff')}}" onchange="colorPicker('op')" class="form-control vacant_color_op">
            </div>
            <div class="col-lg-2">
                <input type="text" disabled value="{{(isset($Open->color_code)?"#".$Open->color_code:'#ffffff')}}" class="form-control vacant_color_op">
            </div>
            <div class="col-lg-2">
                <a onclick="resetColor('op')" class="btn btn-danger btn-xs">Clear</a>
            </div>
        </div>

        <!-- Form Input Field -->
        <div class="form-group">
            <label class="control-label col-lg-2">Ask Bill <span class="text-danger"></span></label>
            <div class="col-lg-5">
                <input type="color"  value="{{(isset($AskBill->color_code)?"#".$AskBill->color_code:'#ffffff')}}" onchange="colorPicker('ab')" class="form-control vacant_color_ab">
            </div>
            <div class="col-lg-2">
                <input type="text" disabled value="{{(isset($AskBill->color_code)?"#".$AskBill->color_code:'#ffffff')}}" class="form-control vacant_color_ab">
            </div>
            <div class="col-lg-2">
                <a onclick="resetColor('ab')" class="btn btn-danger btn-xs">Clear</a>
            </div>
        </div>

        <!-- Form Input Field -->
        <div class="form-group">
            <label class="control-label col-lg-2">Closed <span class="text-danger"></span></label>
            <div class="col-lg-5">
                <input type="color" value="{{(isset($Closed->color_code)?"#".$Closed->color_code:'#ffffff')}}" onchange="colorPicker('cl')" class="form-control vacant_color_cl">
            </div>
            <div class="col-lg-2">
                <input type="text" disabled value="{{(isset($Closed->color_code)?"#".$Closed->color_code:'#ffffff')}}" class="form-control vacant_color_cl">
            </div>
            <div class="col-lg-2">
                <a onclick="resetColor('cl')" class="btn btn-danger btn-xs">Clear</a>
            </div>
        </div>
    </div>
    </form>



    </div>
    </div>
    </div>
    <!-- /main page sources -->
    </div>
    </div>


    <style>
        .form-group{margin-bottom: 15px;}
    </style>

    <script>
        function colorPicker(status) {
            var color = $(".vacant_color_"+status).val();
            color = color.replace(/#/g,'');
            $.ajax({
                type:'get',
                url: '/colorStore/'+status,
                data:{color:color},
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

    //    Reset Color
        function resetColor(status) {
            $(".vacant_color_"+status).val("#ffffff");
        }
    </script>
@endsection
