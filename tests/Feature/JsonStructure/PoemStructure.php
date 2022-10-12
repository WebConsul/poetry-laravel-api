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
            'poet' => [
                'id',
                'slug',
                'birth_date',
                'death_date',
                'portrait_url',
            ],
        ];
    }
}
