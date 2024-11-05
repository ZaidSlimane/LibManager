<?php

namespace App\Models\Types;

class MagazineBook extends BookType
{
    public function getType(): string
    {
        return 'magazine';
    }
}
