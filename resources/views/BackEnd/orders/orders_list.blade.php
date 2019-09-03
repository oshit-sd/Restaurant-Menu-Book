@extends('BackEnd.adminMaster')
@section('ordersList', 'active')
@section('content')

<!--============== List of data ==============-->
<!--============== List of data ==============-->
<div class="panel panel-flat" style="margin-top: 0px;">
    <!-- Form validation -->
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>Date</th>
                <th>Table number</th>
                <th>Order number</th>
                <th>Qty</th>
                <th>Total</th>
                <th class="text-center">Actions</th>
            </tr>
        </thead>
        <tbody>
            @if ($getOrders)
            @foreach ($getOrders as $order)
            <tr>
                <td style="width: 15%;">
                    {{ Carbon\Carbon::parse($order->created_at)->format('d-m-Y g:i:s A') }}
                </td>
                <td style="width: 10%;">{{$order->order_number}}</td>
                <td style="width: 10%;">{{$order->table->fld_name}}</td>
                <td style="width: 5%;">{{$order->total_qty }}</td>
                <td style="width: 5%;">{{$order->total_amount}}</td>
                <td class="text-center" style="width: 10%;">

                    <ul class="icons-list">
                        <li class="text-primary-600">
                            <a href="{{ url('/orders/'.$order->id) }}" class=" linka fancybox fancybox.ajax labelSize2 btn btn-success" data-popup="tooltip" title data-original-title="View_Data"><i class="icon-zoomin3"></i></a>
                        </li>
                        <!-- <li class="text-primary-600">
                            <a href="{{ url('/CategoryEntry/'.$order->id.'/edit') }}" class=" linka fancybox fancybox.ajax labelSize2 btn btn-primary" data-popup="tooltip" title data-original-title="Edit_Data"><i class="icon-pencil7"></i></a>
                        </li>
                        <li class="text-danger-600">
                            <form method="delete" id="deleteForm">
                                {{ csrf_field() }}
                                <a class="labelSize3 btn btn-danger" onclick="deleteData({{$order->id}})" data-popup="tooltip" title data-original-title="Delete_Data"><i class="icon-trash"></i></a>
                            </form>
                        </li> -->
                    </ul>

                </td>
            </tr>

            @endforeach

            <tr>
                <td colspan="6">
                    <!-- Pagination -->
                    {{ $getOrders->links() }}
                </td>
            <tr>
                @endif
        </tbody>
    </table>

</div>
</div>
<!-- /main page sources -->
</div>
</div>
@endsection