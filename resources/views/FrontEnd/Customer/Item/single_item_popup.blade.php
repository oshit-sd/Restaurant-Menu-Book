<div style="width:350px; margin-top:15px;">

    <div class="product-layout product-list col-xs-12">
        <div class="product-thumb">
            @if(isset($item->fld_image))
            <img style="width: 100%!important; height: 215px;" src="{{ asset('upload_file/menu_items/'.$item->fld_image) }}" class="img-responsive" alt="food" title="{{$item->fld_name}}">
            @else
            <img style="width: 100%!important; height: 215px;" src="{{ asset('upload_file/noImage.png') }}" class="img-responsive" alt="food" title="{{$item->fld_name}}">
            @endif
            <br>

            <!-- name -->
            <h4 class="product-name">
                {{ $currency }}{{$item->fld_price}}
                <span style="font-style: italic; color: #424242; font-size: 13px; font-weight: normal;">
                    {{ $item->fld_price_type }}
                </span>
            </h4>
            <!-- price -->
            <h4 class="product-name">
                {{$item->fld_name}}
            </h4>
            <!-- description -->
            <p class="product-desc"> {{ $item->fld_description }}</p>


            {{-- Chilli & Dietaries --}}
            <div class="chilli">
                @if(isset($item->SpiceLevel->fld_chili_icon))
                <img src="{{ asset('upload_file/spice_level/'.$item->SpiceLevel->fld_chili_icon)}}" class="vegetarian">
                @endif

                @if(!empty($item->dietaries))
                @foreach($item->dietaries as $dietary)
                <img src="{{ asset('upload_file/dieatary/'.$dietary->fld_icon_image)}}" class="vegetarian">
                @endforeach
                @endif
            </div>
            <hr>

            <!-- allergy Information -->
            <div>
                @if(!$item->allergies->isEmpty())
                <h4 class="product-name">
                    Allergy Information
                </h4>

                @foreach($item->allergies as $allergy)
                <div>
                    <!-- <b>$allergy->fld_name </b> -->
                    <p style="font-size: 12px;">{{ $allergy->fld_description }}
                        <p>
                </div>
                @endforeach
                @endif
            </div>

        </div>
    </div>

    <style>
        .categoryName {
            font-size: {
                    {
                    $subcategory->fld_front_size
                }
            }

            px !important;

            font-weight: {
                    {
                    ($subcategory->fld_bold=='Yes')? 'bold': ''
                }
            }

             !important;
            color:#ef8829;
        }
    </style>
</div>



<style>
    .caption2 {
        width: 65% !important;
    }
</style>

<style>
    .fancybox-desktop {
        width: 350px !important;
    }

    .fancybox-inner {
        width: 100% !important;
    }

    .fancy {
        width: 100% !important;
    }
</style>