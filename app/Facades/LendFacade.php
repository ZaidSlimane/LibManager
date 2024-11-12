<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class LendFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'LendService';
    }
}
