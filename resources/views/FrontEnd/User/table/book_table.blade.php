<div style="margin: 10px; width:94%;">
    <div style="margin: 10px; width:270px; height: 380px; margin:0 auto; background: #ececec;border: 2px solid #dce2e2;">
        <div class="col-xs-12">
            <h6><b>Table Information</b></h6>
            <hr>
        </div>
        <form action="{{route('TableInfo')}}" method="post">
            @csrf
            <div class="form-group">
                <div class="col-xs-12">
                    <span>Person</span>
                    <input type="number" name="person" required placeholder="Person" class="form-control">
                    <input type="hidden" name="tableid" value="{{$id}}">
                </div>
            </div>
            <div class="form-group">
                <div class="col-xs-12">
                    <span>First Name</span>
                    <input type="text" name="fname" placeholder="First Name" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <div class="col-xs-12">
                    <span>Last Name</span>
                    <input type="text" name="lname" placeholder="Last Name" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <div class="col-xs-12">
                    <span>Start Time</span>
                    <input type="text" name="startTime" value="{{date('H:i')}}" readonly class="form-control">
                </div>
            </div>

            <?php
            $hour = $minute = "0";
            if (isset($time->fld_time)) {
                $times  = explode(':', $time->fld_time);
                $hour   = isset($times[0]) ? $times[0] : '0';
                $minute = isset($times[1]) ? $times[1] : '0';
            }
            $startTime  = date('H:i');
            $endTime    = date('H:i', strtotime('+' . $hour . 'hour +' . $minute . ' minutes', strtotime($startTime)));
            ?>

            <div class="form-group">
                <div class="col-xs-12">
                    <span>End Time</span>
                    <input type="text" name="endTime" value="{{$endTime}}" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <div class="col-xs-3">
                    <input type="checkbox" name="SandClock" value="1">
                </div>
                <div class="col-xs-9" style="padding-top: 5px;">
                    <span>Sand Clock</span>
                </div>
            </div>

            <div class="form-group">
                <div class="col-xs-5"></div>
                <div class="col-xs-1">
                    <button type="submit" class="btn btn-primary btn-sm">CONTINUE</button>
                </div>
            </div>
        </form>
    </div>
</div>

<style>
    span {
        font-size: 11px !important;
    }

    input {
        height: 26px !important;
        font-size: 12px !important;
    }


    /* .fancybox-desktop {
        width: 350px !important;
    }

    .fancybox-inner {
        width: 100% !important;
    }

    .fancy {
        width: 100% !important;
    } */
</style>