<div class="carList" id="Show">

    <form id="EnhanceForm" method="post">
        @csrf()
        <input type="hidden" value="{{isset($activeTab)?$activeTab:'tab-1'}}" class="activeTab" name="activeTab">
        <input type="hidden" id="CartQty" value="{{$cart->qty}}">
        <input type="hidden" class="menuID" name="menuId" value="{{$Item->id}}">
        <input type="hidden" class="rowID" name="rowId" value="{{ $cart->rowId }}">
        <input type="hidden" class="enhanceQty" name="enhanceQty" value="{{$active_qty}}">

        <div class="eh_mainPortion">
            <!-- All Qty -->
            <!-- All Qty -->
            <div class="eh_leftQtyPortion">
                @for($i=1; $i<=$cart->qty; $i++)
                    <div class="eh_qty">
                        <a qty="{{ $i }}" rowID="{{ $cart->rowId  }}" class="btn btn-success btn-sm individual-qty-page enhanceQty_{{$i}} {{($active_qty == $i)?'eh_selected': ''}}">
                            Qty {{$i}}
                        </a>
                    </div>
                    @endfor
            </div>

            <!-- Enhance Option -->
            <!-- Enhance Option -->
            <div class="eh_enhancePortion">
                <!-- enhance Tabs Button -->
                <div style="width: 100%; height: auto; border-right: 1px solid #d3d3d3">
                    <ul class="tabs">
                        @if(count($Item->ingredient_with) > 0)
                        <li class="tab current {{ (!empty($activeTab) && $activeTab == 'tab-1')?$activeTab:''}}" data-tab="tab-1">With</li>
                        @endif

                        @if(count($Item->ingredient_without) > 0)
                        <li class="tab {{(!empty($activeTab) && $activeTab== 'tab-2')?$activeTab:''}}" data-tab="tab-2">
                            Without</li>
                        @endif

                        @if(count($Item->ingredien_extras) > 0)
                        <li class="tab {{(!empty($activeTab) && $activeTab== 'tab-3')?$activeTab:''}}" data-tab="tab-3">
                            Extra</li>
                        @endif
                        <li class="tab {{(!empty($activeTab) && $activeTab== 'tab-4')?$activeTab:''}}" data-tab="tab-4">
                            Message</li>
                    </ul>
                    <div class="eh_button">
                        <a href="#" class="confirm eh_btnDesign btn btn-success btn-block">Confirm</a>
                    </div>
                    <div class="eh_button">
                        <a href="" class="eh_btnDesign btn btn-danger btn-block">Exit</a>
                    </div>
                </div>
            </div>



            <!-- Enhance Item  -->
            <!-- Enhance Item  -->
            <div class="eh_bodyPorion">

                <div style="width: 100%;border-radius: 3px; float:left">
                    <!-- selected enhancement -->
                    @include('FrontEnd.shopping_cart.partials.enhancement')
                    <hr>
                </div>

                <!-- With Portion -->
                @include('FrontEnd.shopping_cart.partials.enhance.enhance_with')

                <!-- Without Portion -->
                @include('FrontEnd.shopping_cart.partials.enhance.enhance_without')

                <!-- Extra Portion -->
                @include('FrontEnd.shopping_cart.partials.enhance.enhance_extra')

                <!-- Message Portion -->
                <div class="tab-4 tab-content">
                    <textarea name="message[{{$active_qty}}]" class="form-control" rows="8" placeholder="Write your message here">@if(($cart->options->message))@if(array_key_exists($active_qty, $cart->options->message)){{$cart->options->message[$active_qty]}}@endif @endif</textarea>
                </div>

            </div>
        </div>
    </form>
    <!-- /.food-item -->
</div>
</div>
</div>

<!--Item Enhancement Js -->
<script src="{{ asset('assets/FrontEnd/js/enhancement.js') }}"></script>

<style>
    .fancybox-close {
        display: none;
    }
</style>