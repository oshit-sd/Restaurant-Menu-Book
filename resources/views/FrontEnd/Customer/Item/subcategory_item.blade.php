@extends('layouts.masterFrontend')
@section('content')
<div class="row result">
    <!-- Left Side -->
    <div id="column-left" class="col-lg-2 col-md-2 col-sm-3 col-xs-3 column-left">
        <div class="row special-grid product-grid">
            <!-- Category ID -->
            <input type="hidden" id="categoryId" value="{{ $categoryID }}">

            @if(!empty($category->subcategories))
            @foreach($category->subcategories as $sCategory)
            <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12 product-grid-item">
                <div class="product-thumb transition leftCategory">
                    <a href="{{url('/sub-category/'.$categoryID.'/'.$sCategory->id)}}">
                        <div class="image product-imageblock">
                            <i class="fa fa-cutlery categoryIcon" aria-hidden="true" class="img-responsive leftIcon"></i>
                        </div>
                        <div class="categoryName">
                            {{ $sCategory->fld_subcategory }}
                        </div>
                    </a>
                </div>
            </div>
            @endforeach @endif

        </div>
    </div>


    <!-- Right Side -->
    <div id="content" class="col-lg-10 col-md-10 col-sm-9 col-xs-9">
        <div class="grid-list-wrapper">
            @php
            $qty = 0;
            $rowID ="";
            $withID ="";
            $withoutID ="";
            $extraID ="";
            $messageID ="";
            $preparationID ="";
            $condimentsID ="";
            @endphp

            <!-- category with sub-category realtion and show item -->
            @if(!empty($subcategory))
            @if(!$subcategory->items->isEmpty())
            @foreach($subcategory->items as $item)

            <!-- cart item -->
            <!-- cart item -->
            @if(count($cartContent)>0)
            @foreach ($cartContent as $key => $cart)

            <!-- store in array single item info -->
            @php
            $cartQty[$cart->id] = [
            $cart->qty,
            $key,
            $cart->options->with_id,
            $cart->options->without_id,
            $cart->options->extra_id,
            $cart->options->message,
            $cart->options->preparation,
            $cart->options->condiments
            ];
            @endphp
            @endforeach


            <!-- check item id in array exist -->
            @if(array_key_exists($item->id, $cartQty))
            <!-- assign cart data in variable  -->
            @php
            $qty = $cartQty[$item->id][0];
            $rowID = $cartQty[$item->id][1];
            $withID = $cartQty[$item->id][2];
            $withoutID = $cartQty[$item->id][3];
            $extraID = $cartQty[$item->id][4];
            $messageID = $cartQty[$item->id][5];
            $preparationID = $cartQty[$item->id][6];
            $condimentsID = $cartQty[$item->id][7];
            @endphp

            @else
            @php
            $qty = 0;
            $rowID ="";
            $withID ="";
            $withoutID ="";
            $extraID ="";
            $messageID ="";
            $preparationID ="";
            $condimentsID ="";
            @endphp @endif @endif


            <!-- single item -->
            @include('FrontEnd.Customer.Item.partials.single_item')

            @endforeach

            @else
            <div class="alert-danger" style="text-align: center; background-color: #f2dede;border-color: #ebccd1; color: #a94442; padding: 10px;margin: 0 20px;">
                <span class="text-danger" style="font-size: 16px;">
                    Sorry!! There are no items in this category right now
                </span>
            </div>
            @endif @endif

        </div>
    </div>

</div>


<style>
    body {
        background: #fff !important;
    }

    .categoryIcon {
        font-size: 65px;
        padding: 10px;
        color: #ef8829;
    }

    .leftCategory {
        background: #000;
    }
</style>
@stop