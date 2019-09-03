<?php
/*
    @Developed By: Oshit Sutra Dar
*/

namespace App\Http\Controllers;

use App\Http\Controllers\Setting\Tables\TableSectionController;
use App\Model\BookingTable;
use App\Model\Tables\Table;
use App\Traits\changeTableStatus;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use App\Model\Tables\TableOccupancyTime;
use App\Model\Tables\TableSection;

class HomeController extends Controller
{
    use changeTableStatus;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $pageTitle = [
            ['/home', ''],
            ['/home', 'Admin Dashboard']
        ];
        $tableId = Session::get('TableInfo')['tableID'];
        //        echo $tableId; die();
        //        if(empty($tableId)):
        $title = "Admin Dashboard";
        return view('FrontEnd.User.dashboard', compact('title', 'pageTitle'));
        //        else:
        //            return Redirect::to('/Customer/Dashboard')->send();
        //        endif;
    }


    // Table===========
    public function table()
    {
        $pageTitle = [
            ['/home', ''],
            ['/table-management', 'Table Management']
        ];
        $tableId = Session::get('TableInfo')['tableID'];
        //        echo $tableId; die();
        //        if(empty($tableId)):
        $title      = 'Table Management';
        $sections   = TableSection::GetTableSection();
        $tables     = Table::GetTables();
        return view('FrontEnd.User.table.index', compact('title', 'pageTitle', 'sections', 'tables'));
        //        else:
        //            return redirect('/Customer/Dashboard');
        //        endif;
    }

    // Check User Back To Home Popup===========
    public function CheckUserBackToHomePopup()
    {
        return view('FrontEnd.User.table.check_user_popup');
    }

    // Check User Back To Home===========
    public function CheckUserBackToHome()
    {
        if (Auth::user()->username == Input::post('username')) {
            return redirect('/table');
        } else {
            return redirect('/Customer/Dashboard')
                ->with('errorMsg', 'Invalid user');
        }
    }


    // Table Info===========
    public function bookTable($id)
    {
        $time = TableOccupancyTime::first();
        return view('FrontEnd.User.table.book_table', compact('id', 'time'));
    }

    // Close Table===========
    public function closeTable($id)
    {
        return view('FrontEnd.User.table.close_table', compact('id'));
    }

    // Close Table Confirm===========
    public function closeConfirm($id)
    {
        // Update table status=================
        $this->updateTableStatus('va', $id);

        // Update booking table status=================
        $this->updateBookingTableStatus($id);
        return back();
    }

    // Submit Table Info===========
    public function submitTableInfo()
    {
        //Insert Data in Booking Table================
        $data = [
            'fld_table_id'      => Input::post('tableid'),
            'fld_person'        => Input::post('person'),
            'fld_first_name'    => Input::post('fname'),
            'fld_last_name'     => Input::post('lname'),
            'fld_start_time'    => Input::post('startTime'),
            'fld_end_time'      => Input::post('endTime'),
            'status'            => 's',
        ];
        $bID = BookingTable::create($data);

        //Session data set===========
        $arr = [
            'tableID'       => Input::post('tableid'),
            'person'        => Input::post('person'),
            'startTime'     => Input::post('startTime'),
            'endTime'       => Input::post('endTime'),
            'SandClock'     => Input::post('SandClock'),
            'bookingId'     => $bID->id,
        ];
        Session::put('TableInfo', $arr);


        // Update table status=================
        $this->updateTableStatus('oc', Input::post('tableid'));

        return redirect('customer-dashboard');
    }
}
