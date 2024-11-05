<?php

namespace App\Factories;

use App\Models\Types\PaperBook;
use App\Models\Types\DigitalBook;
use App\Models\Types\DictionaryBook;
use App\Models\Types\MagazineBook;
use InvalidArgumentException;

class BookFactory
{
    public static function create(string $type)
    {
        return match ($type) {
            'papier' => new PaperBook(),
            'numérique' => new DigitalBook(),
            'dictionnaire' => new DictionaryBook(),
            'magazine' => new MagazineBook(),
            default => throw new InvalidArgumentException("Type de livre inconnu: $type"),
        };
    }
}
