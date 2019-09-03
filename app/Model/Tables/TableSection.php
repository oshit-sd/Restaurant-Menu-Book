<?php

namespace App\Model\Tables;

use Illuminate\Database\Eloquent\Model;

class TableSection extends Model
{
    protected $guarded = [];

    public function ScopeGetTableSection()
    {
        return TableSection::select(
            'id',
            'fld_name'
        )
            ->where('fld_status', 'a')->get();
    }
}
