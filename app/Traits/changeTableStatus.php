<?php

namespace App\Traits;

use App\Model\BookingTable;
use App\Model\Tables\Table;

trait changeTableStatus
{

    private function updateTableStatus($status, $tableID)
    {
        $data = ['table_status' => $status];
        Table::where('id', $tableID)->update($data);
    }

    private function updateBookingTableStatus($tID)
    {
        $data = ['status' => 'b'];
        BookingTable::where('fld_table_id', $tID)->update($data);
    }
}
