<?php

namespace Tests\Feature\JsonStructure;

class PaginatedPoetList
{
    public static function getStructure(): array
    {
        return array_merge(PaginatedList::getStructure(), ['data' => ['*' => PoetStructure::getStructure()]]);
    }

    public static function getTypes(): array
    {
        return [
            'data.0.id' => 'integer',
            'data.0.birth_date' => 'string',
            'data.0.death_date' => 'string',
            'data.0.portrait_url' => 'string',

            'data.0.poet_data' => 'array',
            'data.0.poet_data.0.id' => 'integer',
            'data.0.poet_data.0.poet_id' => 'integer',
            'data.0.poet_data.0.language' => 'string',
            'data.0.poet_data.0.first_name' => 'string',
            'data.0.poet_data.0.last_name' => 'string',
            'data.0.poet_data.0.description' => 'string',
        ];
    }
}
