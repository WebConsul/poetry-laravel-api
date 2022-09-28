<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class PoetTest extends TestCase
{
    use RefreshDatabase;

    public function test_get_data(): void
    {
        $this->seed();

        $response = $this->get('/api/poets');

        $response
            ->assertHeader('content-type', 'application/json')
            ->assertStatus(200)
            ->assertJsonStructure([
                'current_page',
                'first_page_url',
                'from',
                'last_page',
                'last_page_url',
                'links' => [
                    '*' => [
                        'url',
                        'label',
                        'active'
                    ],
                ],
                'next_page_url',
                'path',
                'per_page',
                'prev_page_url',
                'to',
                'total',
                'data' => [
                    '*' => [
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
                    ],
                ],
            ])
            ->assertJson(fn(AssertableJson $json) => $json
                ->whereAllType([
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
                ])
            );
    }
}
