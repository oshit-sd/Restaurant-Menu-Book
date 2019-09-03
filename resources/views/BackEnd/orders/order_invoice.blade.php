<div class="col-sm-12" style="width: 750px; background: #fff;">
    <!-- Content area -->
    <div class="content" id="printPage">
        <!-- Main content -->
        <div class="row">
            <div class="col-lg-12">
                <!-- main page sources -->
                <div class="panel-body" style="border: 1px solid #d6d5d5; border-radius: 5px;">
                    <div class="row">

                        <div style="margin-bottom: 10px; width: 25%; float: left;">
                            <img src="{{ asset('upload_file/logo/obt7JhZU.png')}}" style=" width: 140px; height: 100px;">
                        </div>
                        <div style="width: 75%; float: left;">
                            <div style="font-size: 26px;"><b>eMenu Resturant</b></div>
                            <div>Phone: 011111111,</div>
                            <div>Email: emenu@gmail.com,</div>
                            <div>Address: Dhaka, Bangladesh.</div>
                        </div>
                        <div class="col-lg-12">
                            @include('FrontEnd.Customer.partials.order.order_table')
                        </div>
                    </div>
                </div>
            </div>

            <!-- /main page sources -->
        </div>
        <!-- /main content -->
    </div>
    <a style="float: right;" class="btn btn-success btn-xs" title="Print This" onclick="printContent('printPage')"><i class="icon-printer2"></i></a>

</div>