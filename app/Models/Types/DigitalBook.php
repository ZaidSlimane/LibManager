<?php

namespace App\Models\Types;
class DigitalBook extends BookType
{
    public function getType(): string
    {
        return 'numérique';
    }
}