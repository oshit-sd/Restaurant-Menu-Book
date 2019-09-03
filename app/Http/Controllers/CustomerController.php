<?php

namespace App\Http\Controllers;

use Cart;
use Session;
use App\Model\Service;
use App\Model\Category;
use App\Model\Subcategory;
use App\Model\Tables\Table;
use App\Model\Order\Orders;
use App\Model\Menuitem\Menuitems;
use App\Http\Controllers\Controller;
use App\Model\Order\OrderDetails;

class CustomerController extends Controller
{
    /*
     * Dashboard
     */
    public function index()
    {
        $pageTitle = [
            ['/home', ''],
            ['/table-management', 'Table Management'],
            ['/customer-dashboard', 'Customer Dashboard']
        ];

        $title      = "Customer Dashboard";
        $categories = Category::GetCategoryForHome();
        $tableId    = Session::get('TableInfo')['tableID'];
        // $person     = Session::get('TableInfo')['person'];
        // $startTime  = Session::get('TableInfo')['startTime'];
        if (isset($tableId)) :
            $tableName = Table::find($tableId);
        else :
            $tableName = "";
        endif;
        if (empty($tableId)) :
            return redirect('/home')->with('errorMsg', 'Sorry!! you have not selected any table');

        else :
            return view(
                'FrontEnd.Customer.dashboard',
                compact('title', 'pageTitle',  'categories')
            );
        endif;
    }

    /*
     * Category Item
     */
    public function categoryItem(Category $category, $title)
    {
        $url        = '/category/' . $category->id . '/' . $title;
        $pageTitle  = [
            ['/home', ''],
            ['/table-management', 'Table Management'],
            ['/customer-dashboard', 'Customer Dashboard'],
            [$url, $title]
        ];

        $cartContent    = Cart::content();
        $categoryID     = $category->id;
        return view('FrontEnd.Customer.Item.category_item', compact('title', 'pageTitle',  'cartContent', 'category', 'categoryID'));
    }

    /*
     * Sub Category Item
     */
    public function subCategoryItem(Category $category, Subcategory $subcategory)
    {
        $url        = '/category/' . $category->id . '/' . $category->fld_category;
        $surl       = '/sub-category/' . $category->id . '/' . $subcategory->id;
        $pageTitle  = [
            ['/home', ''],
            ['/table-management', 'Table Management'],
            ['/customer-dashboard', 'Customer Dashboard'],
            [$url, $category->fld_category],
            [$surl, $subcategory->fld_subcategory]
        ];

        $title          = $category->fld_category . " - " . $subcategory->fld_subcategory;
        $categoryID     = $category->id;
        $cartContent    = Cart::content();
        $subcategories  = Subcategory::GetSubcategory();
        return view(
            'FrontEnd.Customer.Item.subcategory_item',
            compact('title', 'pageTitle', 'cartContent', 'categoryID', 'category', 'subcategory', 'subcategories')
        );
    }

    /*
     * View single Item
     */
    public function singleItem(Menuitems $menuitems)
    {
        $title  = "View Item";
        $item   = $menuitems;
        return view('FrontEnd.Customer.Item.single_item_popup', compact('item', 'title'));
    }


    /*
     * Get My Orders
     */
    public function getMyOrders()
    {
        $title      = "My Orders";
        $orderID    = Session::get('orderID');
        $tableId    = Session::get('TableInfo')['tableID'];
        $orders     = Orders::select(
            'id',
            'table_id',
            'order_number',
            'total_qty',
            'total_amount',
            'created_at'
        )
            ->where('fld_status', 'a')
            ->where('table_id', $tableId)
            ->where('id', $orderID)->get();
        return view('FrontEnd.Customer.my_orders', compact('title', 'orders'));
    }

    /*
     * Services
     */
    public function Services()
    {
        $getService    = Service::GetService();
        return view('FrontEnd.Customer.service_page', compact('getService'));
    }

    /*
     * Request Bill
     */
    public function MyBill()
    {
        $title          = "Request Bill";
        $orderID        = Session::get('orderID');
        $orderDetails   = OrderDetails::where('orders_id', $orderID)->get();

        return view('FrontEnd.Customer.request_bill', compact('title', 'orderDetails'));
    }


    public function __construct()
    {
        $this->middleware(['auth:web']);
    }
}
