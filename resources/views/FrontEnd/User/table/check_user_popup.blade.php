<div class="container" style="width:100%;">
    <div class="row" style="padding: 15px;">
        <div class="col-xs-12  col-md-12 col-sm-12">
            <div style="font-size: 15px; ">User Name</div>
            <hr>
            <form method="post" action="{{url('/CheckUser')}}">
                @csrf
                <input type="text" name="username" class="form-control" placeholder="Username">
                <button type="submit" style="margin-top: 10px;" class="btn btn-success btn-sm">Submit</button>
            </form>

        </div>

    </div>

    <style>
        span{font-size: 11px!important;}
        input{
            height: 26px!important;
            font-size: 12px!important;
        }
        .form-group{ padding-bottom: 30px!important;}
    </style>
</div>