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

    /**
     * @return array
     */
    public static function getPoetStructureWithPoemsAndCollections(): array
    {
        return [
            'id',
            'birth_date',
            'death_date',
            'portrait_url',
            'slug',
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
            'poems' => [
                '*' => [
                    'id',
                    'poet_id',
                    'translation_of',
                    'language',
                    'title',
                    'created',
                    'slug'
                ]
            ],
            'collections' => [
                '*' => [
                    'id',
                    'title',
                    'publisher',
                    'location',
                    'date',
                    'slug',
                ],
            ],
        ];
    }
}
