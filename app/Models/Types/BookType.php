<?php

namespace App\Models\Types;

abstract class BookType
{
    abstract public function getType(): string;
}
