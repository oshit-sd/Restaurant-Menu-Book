<div class="col-sm-12" style="width: 700px;">

    <!-- Page header -->
    <div class="page-header">
        <div class="breadcrumb-line">
            <ul class="breadcrumb">
                <li class="active btn btn-primary btn-xs" style="background: #1D2841;">
                    <a href="#" style="color: #ddd;">
                        <i class="icon-eye"></i> View Item
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <!-- /page header -->


    <!-- Content area -->
    <div class="content" >
        <!-- Main content -->
        <div class="row">
            <div class="col-lg-12">
                <!-- main page sources -->
                <div class="panel panel-flat">
                    <!-- Form validation -->

                    <div class="panel-body">
                        <table class="table table-bordered table-hover datatable-highlight">
                            <tr>
                                <th style="width: 30%;">SL NO.</th>
                                <td style="width: 70%;">{{$data->fld_serial_numbr}}</td>
                            </tr>
                            <tr>
                                <th>Name</th>
                                <td>{{$data->fld_name}}</td>
                            </tr>
                            <tr>
                                <th>Price</th>
                                <td>{{$data->fld_price}}</td>
                            </tr>
                            <tr>
                                <th>Sub-category</th>
                                <td>{{$data->subCategory->fld_subcategory}}</td>
                            </tr>
                            <tr>
                                <th>Dietary</th>
                                <td>
                                    @if(!empty($data->dietaries))
                                        @foreach($data->dietaries as $dietary)
                                            <label class="bg-teal" style="padding: 0px 10px;">
                                                {{ $dietary->fld_name }}
                                            </label>
                                        @endforeach
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Spice Level</th>
                                <td>{{isset($data->SpiceLevel->fld_name)?$data->SpiceLevel->fld_name:""}}</td>
                            </tr>
                            <tr>
                                <th>Condiments Group</th>
                                <td>
                                    @if(!empty($data->condiments_group))
                                        @foreach($data->condiments_group as $condiment)
                                            <label class="bg-teal" style="padding: 0px 10px;">
                                                {{ $condiment->fld_name }}
                                            </label>
                                        @endforeach
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Preparation Group</th>
                                <td>
                                    @if(!empty($data->preparation_group))
                                        @foreach($data->preparation_group as $condiment)
                                            <label class="bg-teal" style="padding: 0px 10px;">
                                                {{ $condiment->fld_name }}
                                            </label>
                                        @endforeach
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>With Ingredients</th>
                                <td>
                                    @if(!empty($data->ingredient_group))
                                        @foreach($data->ingredient_group as $with)
                                            @if($with->fld_with == 1)
                                                <label class="bg-teal" style="padding: 0px 10px;">
                                                    {{ $with->fld_name }}
                                                </label>
                                            @endif
                                        @endforeach
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Without Ingredients</th>
                                <td>
                                    @if(!empty($data->ingredient_group))
                                        @foreach($data->ingredient_group as $with)
                                            @if($with->fld_without == 1)
                                                <label class="bg-teal" style="padding: 0px 10px;">
                                                    {{ $with->fld_name }}
                                                </label>
                                            @endif
                                        @endforeach
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Extras Ingredients</th>
                                <td>
                                    @if(!empty($data->ingredient_group))
                                        @foreach($data->ingredient_group as $with)
                                            @if($with->fld_extras == 1)
                                                <label class="bg-teal" style="padding: 0px 10px;">
                                                    {{ $with->fld_name }}
                                                </label>
                                            @endif
                                        @endforeach
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Meal Course</th>
                                <td>{{isset($data->MealCourse->fld_name)?$data->MealCourse->fld_name:""}}</td>
                            </tr>
                            <tr>
                                <th>Allergy</th>
                                <td>
                                    @if(!empty($data->allergies))
                                        @foreach($data->allergies as $allergy)
                                            <label class="bg-teal" style="padding: 0px 10px;">
                                                {{ $allergy->fld_name }}
                                            </label>
                                        @endforeach
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Image</th>
                                <td>
                                    @if(isset($data->fld_image))
                                        <img src="{{ asset('upload_file/menu_items/'.$data->fld_image) }}" style="height: 50px; width: 80px;">
                                    @else
                                        <img src="{{ asset('upload_file/noImage.png/') }}" style="height: 50px; width: 80px;">
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Description</th>
                                <td>{{$data->fld_description}}</td>
                            </tr>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

