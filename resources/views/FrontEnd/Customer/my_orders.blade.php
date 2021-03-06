<div class="carList">
    <!-- Header Section -->
    <div class="headding">
        <b><i class="fa fa-cart-plus"></i>My Orders </b>
    </div>

    <!-- Body Section -->
    <div style="width: 97%;">
        @if(!$orders->isEmpty())
        <div class="table-responsive-sm">
            @include('FrontEnd.Customer.partials.order.order_table')
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

    .aBtn {
        padding: 7px 40px;
        font-size: 15px;
    }

    .bbttn {
        padding: 3px 40px;
        font-size: 15px;
    }
</style>