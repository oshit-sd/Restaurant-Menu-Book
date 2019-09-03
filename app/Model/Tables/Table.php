<?php

namespace App\Model\Tables;

use App\Model\BookingTable;
use App\Model\Tables\TableSection;
use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    protected $guarded = [];

    public function scopeGetTables()
    {
        return Table::select(
            'id',
            'fld_section_id',
            'fld_name',
            'table_status'
        )
            ->where('fld_status', 'a')->get();
    }


    public function sectionName()
    {
        return $this->hasOne(TableSection::class, 'id', 'fld_section_id');
    }

    public function colorCode()
    {
        return $this->hasOne(ColorPicker::class, 'table_status', 'table_status');
    }

    public function bookInfo()
    {
        return $this->hasOne(BookingTable::class, 'fld_table_id', 'id')
            ->where('status', 's');
    }
}
