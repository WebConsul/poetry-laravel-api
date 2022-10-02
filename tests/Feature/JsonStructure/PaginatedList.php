<?php

namespace Tests\Feature\JsonStructure;

class PaginatedList
{
    public static function getStructure(): array
    {
        return [
            'current_page',
            'first_page_url',
            'from',
            'last_page',
            'last_page_url',
            'links' => [
                '*' => [
                    'url',
                    'label',
                    'active',
                ],
            ],
            'next_page_url',
            'path',
            'per_page',
            'prev_page_url',
            'to',
            'total',
            'data',
        ];
    }

    public static function getTypes(): array
    {
        return [
            'current_page' => 'integer',
            'first_page_url' => 'string',
            'from' => 'integer',
            'last_page' => 'integer',
            'last_page_url' => 'string',

            'links' => 'array',
            'links.0.url' => 'string|null',
            'links.0.label' => 'string|null',
            'links.0.active' => 'boolean|null',

            'next_page_url' => 'string|null',
            'path' => 'string',
            'per_page' => 'integer',
            'prev_page_url' => 'string|null',
            'to' => 'integer',
            'total' => 'integer',
            'data' => 'array',
        ];
    }
}
