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
        <?php $subTotal =  $total = 0;
        $uniquePreparationArr   = null;
        $orderIngredientArr     = null;
        $qtyMessage             = null;
        $enhanceQty             = null;
        $enhancePreparationArr  = null;
        $categoryArr[]          = null;
        ?>
        @foreach($orders as $order)
        @foreach($order->details as $details)

        <!-- Category Name -->
        @include('FrontEnd.Customer.partials.category_name')
        <?php
        $categoryArr =  [$details->category_id];
        ?>


        <!--========== enhance & item ===========-->
        <!--========== enhance & item ===========-->
        <!--========== enhance & item ===========-->
        @if(!$details->orderIngredient->isEmpty())
        <?php
        // same qty ingredient array===========
        $orderIngredientArr = App\Model\Order\OrderIngredinent::ingredinent($details->qty, $details->orderIngredient);
        ?>
        @foreach($orderIngredientArr['qtyEnahnce'] as $keyQty => $ingredientQty)
        <?php
        // get qty message===========
        $qtyMessage = App\Model\Order\OrderMessage::message($keyQty, $details->id);
        $qty = 1;
        $subTotal   = $details->price * $qty;
        $total      += $subTotal;
        ?>
        <!-- Item -->
        @include('FrontEnd.Customer.partials.item')


        <!-- Preparation && Condiments name -->
        @if(!$details->orderPreparation->isEmpty())
        <?php
        // same qty preparation array===========
        $enhancePreparationArr = App\Model\Order\OrderPreparation::uniquePreparation($details->qty, $details->orderPreparation, "", $orderIngredientArr['qtyEnahnce'], "enhance");
        ?>
        @foreach($enhancePreparationArr as $pQty => $preparationArr)

        <!-- Preparation name -->
        @include('FrontEnd.Customer.partials.preparation_name')

        <!-- Condiments name -->
        @include('FrontEnd.Customer.partials.condiments_name')

        @endforeach @endif


        <!-- enhancement -->
        @include('FrontEnd.Customer.partials.enhancement')

        @endforeach
        <!-- end qty enhancement -->

        @endif
        <!-- end enhance & item  -->




        <!--============ preparation & item ==============-->
        <!--============ preparation & item ==============-->
        <!--============ preparation & item ==============-->
        @if(!$details->orderPreparation->isEmpty())
        <?php
        if (!empty($orderIngredientArr['qtyEnahnce'])) :
            $enhanceQty = $orderIngredientArr['qtyEnahnce'];
        endif;
        // same qty preparation array===========
        $uniquePreparationArr = App\Model\Order\OrderPreparation::uniquePreparation($details->qty, $details->orderPreparation, "", $enhanceQty, "");
        ?>
        @foreach($uniquePreparationArr as $prQty => $preparationArr)

        <?php
        $qty = 0;
        // common preparation qty===========
        $qty = App\Model\Order\OrderPreparation::uniquePreparation($details->qty, $details->orderPreparation, $preparationArr, $enhanceQty, "");
        $subTotal = $details->price * $qty;
        $total += $subTotal;
        $keyQty = $prQty;
        ?>
        <!-- Item -->
        @include('FrontEnd.Customer.partials.item')

        <!-- Preparation name -->
        @include('FrontEnd.Customer.partials.preparation_name')

        <!-- Condiments name -->
        @include('FrontEnd.Customer.partials.condiments_name')

        @endforeach
        <!-- end preparation & item  -->

        @else
        <?php
        $qty = $details->qty;
        $subTotal = $details->price * $qty;
        $total += $subTotal;
        ?>
        <!-- Item -->
        @include('FrontEnd.Customer.partials.item')
        @endif


        @endforeach
        <!-- end Order details -->
        @endforeach
        <!-- end Orders -->

        <!-- Total -->
        <tr>
            <td class="right" colspan="4"><b>Total :</b></td>
            <td class="right">{{ number_format((float)$total,2) }}</td>
        </tr>
    </tbody>
</table>

<style>
    .table {
        width: 100% !important;
    }

    .right {
        text-align: right;
    }

    .center {
        text-align: center;
    }

    .removeBorderPadding {
        padding: 5px 8px !important;
        line-height: 1 !important;
        border-top: 0 !important;
    }
</style>