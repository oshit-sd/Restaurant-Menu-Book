<?php
Auth::routes();

/*===========category & Sub Category Entry=============*/
Route::namespace('Category')->group(function () {
    Route::resource('/category',                        'CategoryController');

    Route::resource('/subcategory',                     'SubcategoryController');
    Route::get('/removeCategoryS/{id}/{sid}',           'SubcategoryController@removeCategory');
});

/*===========Menu Item Entry=============*/
Route::namespace('Menuitem')->group(function () {
    Route::resource('/menuitems',                   'MenuitemsController');
    Route::get('/removeDietaryMI/{did}/{mid}',      'MenuitemsController@removeDietaryMI');
    Route::get('/removeCondimentMI/{cid}/{mid}',    'MenuitemsController@removeCondimentMI');
    Route::get('/removePreparationMI/{cid}/{mid}',  'MenuitemsController@removePreparationMI');
    Route::get('/removeIngredientMI/{igid}/{mid}',  'MenuitemsController@removeIngredientMI');
    Route::get('/removeAllergyMI/{aid}/{mid}',      'MenuitemsController@removeAllergyMI');
    Route::get('/categoryWiseItem/{category}',      'MenuitemsController@categoryWiseItem');
    Route::get('/subCategoryWiseItem/{subcategory}', 'MenuitemsController@subCategoryWiseItem');

    /*===========Dietary Entry=============*/
    Route::resource('/dietary',                         'DietaryController');

    /*===========Spice Level Entry=============*/
    Route::resource('/spicelevel',                      'SpicelevelController');

    /*===========Condiments & Group Entry=============*/
    Route::namespace('Condiment')->group(function () {
        Route::resource('/condiments',                  'CondimentsController');
        Route::resource('/condimentsGroup',             'CondimentsGroupController');
        Route::get('/removeCondimentG/{cid}/{cgid}',    'CondimentsGroupController@removeCondiment');
    });

    /*===========Ingredient & Group Entry=============*/
    Route::namespace('Ingredient')->group(function () {
        Route::resource('/ingredient',                  'IngredientController');
        Route::resource('/IngredientGroup',             'IngredientGroupController');
        Route::get('/removeIngredientG/{iid}/{igid}',   'IngredientGroupController@removeIngredient');
    });

    /*===========Preparation & Group Entry=============*/
    Route::namespace('Preparation')->group(function () {
        Route::resource('/preparation',                 'PreparationController');
        Route::resource('/preparationGroup',            'PreparationGroupController');
        Route::get('/removePreparationG/{pid}/{pgid}',  'PreparationGroupController@removePreparation');
    });

    /*===========Mealcourse Entry=============*/
    Route::resource('/MealCourse',                      'MealCourseController');

    /*===========Allergy Entry=============*/
    Route::resource('/allergy',                         'AllergyController');
});


/*===========Restaurant Setting=============*/
Route::namespace('Setting')->group(function () {
    Route::get('/RestaurantSetting/create',             'RestaurantSettingController@create');
    Route::post('/RestaurantSetting',                   'RestaurantSettingController@store');
    Route::post('/RestaurantSetting/{id}',              'RestaurantSettingController@update');

    /*===========Table & Section & Occupancy Entry=============*/
    Route::namespace('Tables')->group(function () {
        Route::resource('/table',                       'TableController');
        Route::resource('/tableSection',                'TableSectionController');

        /*===========ColorPicker Entry=============*/
        Route::get('/ColorPicker/create',                'ColorPickerController@create');
        Route::get('/colorStore/{id}',                   'ColorPickerController@store');

        /*===========Table Occupancy Entry=============*/
        Route::get('/TableOTime/create',                 'TableOccupancyTimeController@create');
        Route::post('/TableOTime',                       'TableOccupancyTimeController@store');
        Route::patch('/TableOTime/{id}',                 'TableOccupancyTimeController@update');
    });

    /*=========== Services =============*/
    Route::resource('/service',                          'ServiceController');
});

/*===========Orders=============*/
Route::namespace('Order')->group(function () {
    Route::resource('/orders',                            'OrdersController');
});

/*===========User Entry=============*/
Route::resource('/UserEntry',                             'UserController');


/*===========Admin Info=============*/
/*===========Admin Info=============*/
Route::resource('Admin',                            'AdminController');
Route::get('UserChangePass/{id}',                   'AdminController@user_change_password_page');
Route::post('UserPasswordChange/{id}',              'AdminController@user_password_change');
Route::post('oldPasswordCheck/{id}',                'AdminController@old_password_check');
Route::get('ChangePassword/{id}',                   'AdminController@change_password_page');
Route::post('passwordChange/{id}',                  'AdminController@password_change');



//use Spatie\Permission\Models\Role;
//use Spatie\Permission\Models\Permission;
//
//Route::get('/create_per', function(){
//    $role = Role::create(['name' => 'Super Admin']);
//    $permission = Permission::create(['name' => 'All Access']);
//    auth()->user()->assignRole('Super Admin');
//    auth()->user()->givePermissionTo('All Access');
//});

/*===========User Roles & Permission=============*/
/*===========User Roles & Permission=============*/
Route::namespace('RolePermission')->group(function () {
    Route::resource('roles',        'RoleController');
    Route::resource('permissions',  'PermissionController');
});
