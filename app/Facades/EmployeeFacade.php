<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class EmployeeFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'EmployeeService';
    }
}
