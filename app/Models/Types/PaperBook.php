<?php

namespace App\Models\Types;

class PaperBook extends BookType
{
    public function getType(): string
    {
        return 'papier';
    }
}