<?php

namespace Tests\Feature\JsonStructure;

class PoemStructure
{
    public static function getStructure(): array
    {
        return [
            'id',
            'title',
            'slug',
            'language',
            'created',
            'poet' => PoetStructure::getStructure(),
        ];
    }
}
