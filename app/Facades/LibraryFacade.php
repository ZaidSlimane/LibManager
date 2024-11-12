<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class LibraryFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'LibraryService';
    }
}
