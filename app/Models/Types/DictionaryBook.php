<?php

namespace App\Models\Types;
class DictionaryBook extends BookType
{
    public function getType(): string
    {
        return 'dictionnaire';
    }
}
