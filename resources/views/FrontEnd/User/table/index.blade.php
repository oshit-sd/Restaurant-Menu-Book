@extends('layouts.masterFrontend')
@section('content')

<div class="row">
    @php $i = 0; $sec=0; $act=0; @endphp

    @if($sections)
    <div class="container tableSection">

        <ul class="tabs">
            @foreach($sections as $section)
            <?php $sec++; ?>
            <li class="tab {{ ($sec == 1)?'current':'' }}  tab-{{  $sec }}" data-tab="tab-{{  $sec }}">
                {{ $section->fld_name }}
            </li>
            @endforeach
        </ul>
    </div>

    <div class="row row2">
        @if($tables)
        @foreach($sections as $section)
        <?php $act++; ?>
        <div class="tab-{{  $act }} tab-content {{ ($act == 1)?'current':'' }}">
            @foreach($tables as $table) @if($table->fld_section_id == $section->id)
            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4 colDiv">
                @if($table->table_status=="va")
                <a href="{{url('/bookTable/'.$table->id)}}" class="linka fancybox fancybox.ajax tableDiv_{{$i}} ">
                    @else
                    <a href="{{url('/closeTable/'.$table->id)}}" class="linka fancybox fancybox.ajax tableDiv_{{$i}}">
                        @endif
                        <div class="row special-grid product-grid myGrid table" style="background:{{"#".$table->colorCode->color_code}};">

                            <div class="tableName"> {{$table->fld_name}}</div>

                            <div class="tableLeft">
                                {{isset($table->bookInfo->fld_first_name)? $table->bookInfo->fld_first_name: ''}}
                            </div>

                            <div class="tableRight">{{ "0.00" }}</div>

                            <div class="tableMiddle">
                                @if(isset($table->bookInfo->fld_person))
                                Amount ${{(Cart::subtotal())?Cart::subtotal():"0"}}
                                @endif
                            </div>

                            <div class="tableBottom">
                                {{isset($table->bookInfo->fld_person)? 'P '.$table->bookInfo->fld_person :''}}
                            </div>

                        </div>
                    </a>
            </div>
            @endif @endforeach
        </div>
        @endforeach @endif
    </div>

    @endif
</div>

<style>
    .tab-content {
        background: none !important;
        padding: 0px !important;
        margin-top: 0 !important;
    }

    .tabs {
        padding: 0px !important;
    }

    .tabs li {
        width: 15%;
    }

    .category {
        background-color: #e5e5e5 !important;
    }
</style>
@stop