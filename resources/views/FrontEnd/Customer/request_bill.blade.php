<div class="carList">
    <!-- Header Section -->
    <div class="headding">
        <b><i class="fa fa-cart-plus"></i>My Bill </b>
    </div>

    <!-- Body Section -->
    <div style="width: 97%;">
        @if(!$orderDetails->isEmpty())
        <div class="table-responsive-sm">
            <table class="table">
                <thead>
                    <tr>
                        <th>Item</th>
                        <th>Sub Category</th>
                        <th class="center">Qty</th>
                        <th class="right">Price</th>
                        <th class="right">Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $subTotal = $total = $qty = 0;
                    $categoryArr[]          = null; ?>
                    @foreach($orderDetails as $details)
                    <?php
                    $qty        = $details->qty;
                    $subTotal   = $details->price * $qty;
                    $total      += $subTotal;
                    ?>
                    <!-- Category Name -->
                    @include('FrontEnd.Customer.partials.category_name')
                    <?php
                    $categoryArr =  [$details->category_id];
                    ?>

                    <!-- Item -->
                    @include('FrontEnd.Customer.partials.item')

                    @endforeach

                    <!-- Total Calculation -->
                    @include('FrontEnd.Customer.partials.calculation')

                </tbody>
            </table>
        </div>
        <div style="float: right; margin-bottom: 20px;">
            <a href="" class="btn btn-danger aBtn">Cancel</a>
            <button type="button" class="btn btn-success btn-sm bbttn">I would like to pay</button>
        </div>
        @else

        <div style="text-align: center; margin: 20px 0;">
            <b>Sorry!!</b> You haven't placed an order yet.
        </div>
        @endif
    </div>
</div>

<style>
    .headding {
        width: 97%;
        background: #464646;
        padding: 5px;
        text-align: center;
        font-size: 16px;
        color: #ccc;
    }

    .table {
        color: #222;
        font-size: 12px;
    }

    .right {
        text-align: right;
    }

    .center {
        text-align: center;
    }

    .aBtn {
        padding: 7px 40px;
        font-size: 15px;
    }

    .bbttn {
        padding: 3px 40px;
        font-size: 15px;
    }
</style>