<?php

// Login User Check===========
Route::get('/',                     'Auth\LoginController@showLoginForm');
Route::get('/d',                     'ShoppingCart@destroyCart');

Auth::routes();

//Dashboard===========
Route::get('/home',                         'HomeController@index')->name('home');

//Table Info===========
Route::get('/table-management',             'HomeController@table');
Route::get('/CheckUserPopup',               'HomeController@CheckUserBackToHomePopup');
Route::post('/CheckUser',                   'HomeController@CheckUserBackToHome');

Route::get('/bookTable/{id}',               'HomeController@bookTable');
Route::post('/Table/Info/Submit',           'HomeController@submitTableInfo')->name('TableInfo');
Route::get('/closeTable/{id}',              'HomeController@closeTable');
Route::get('/closeConfirm/{id}',            'HomeController@closeConfirm');

//Customer Dashboard===========
Route::get('/customer-dashboard',           'CustomerController@index');
// My Orders==============
Route::get('/my-orders',                    'CustomerController@getMyOrders');
// Service ==============
Route::get('/services',                     'CustomerController@Services')->name('Services');
//Request Bill ==============
Route::get('/my-bill',                      'CustomerController@MyBill')->name('MyBill');

//Menu Items =============
Route::get('/category/{category}/{name}',    'CustomerController@categoryItem');
Route::get(
    '/sub-category/{category}/{subcategory}',
    'CustomerController@subCategoryItem'
);
Route::get('/single-item/{menuitems}',      'CustomerController@singleItem');

//preparation Popup
Route::get('/popupPreparation/{qty}/{id}/{cateID}/{cond}', 'ShoppingCart@preparationPopup');
Route::post('/addToCartWithPreparation',    'ShoppingCart@addToCartWithPreparation');
Route::post('/preparationNext',             'ShoppingCart@preparationNext');

//condiments Popup
Route::get('/popupCondiments/{id}/{cateID}', 'ShoppingCart@condimentsPopup');
Route::post('/addToCartWithCondiments',      'ShoppingCart@addToCartWithCondiments');

//Shopping Cart===========
Route::get('/addToCart/{mid}/{cid}',        'ShoppingCart@addToCart');
Route::get('/cartlist',                     'ShoppingCart@cartList')->name('CartList');
Route::get('/removeToCart/{rid}',           'ShoppingCart@removeToCart');
Route::get('/singleItemQtyPage/{rid}',      'ShoppingCart@singleItemQtyPage');
Route::get('/removeSingleQty/{rid}',        'ShoppingCart@removeSingleQty');


Route::get('/deleteCart/{id}',              'ShoppingCart@deleteCart');
Route::get('/itemEnhancement/{rid}/{qty}',  'ShoppingCart@itemEnhancement');
Route::post('/submitEnhance',               'ShoppingCart@submitEnhance');
Route::get('/confirm/order',                'ShoppingCart@orderStore');




// Login admin Check===========
Route::get('Login/Admin', 'Auth\AdminLoginController@ShowLoginForm')->name('admin.loginme');

Route::prefix('admin')->group(function () {
    Route::post('loginme', 'Auth\AdminLoginController@Adminlogin')->name('admin.login.submit');
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
});
