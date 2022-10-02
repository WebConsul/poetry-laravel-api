<?php

namespace Tests\Feature\JsonStructure;

class PoetStructure
{
    public static function getStructure(): array
    {
        return [
            'id',
            'birth_date',
            'death_date',
            'portrait_url',
            'poet_data' => [
                '*' => [
                    'id',
                    'poet_id',
                    'language',
                    'first_name',
                    'last_name',
                    'description',
                ],
            ],
        ];
    }
}
