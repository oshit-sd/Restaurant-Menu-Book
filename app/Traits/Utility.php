<?php

namespace App\Traits;


trait Utility
{

    // Construct ===============
    // public function __construct()
    // {
    //     $this->middleware('auth:admin');
    // }

    public function __construct()
    {
        $this->middleware(['auth:admin', 'UserRolePermission']);
    }
}