<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class PoetTest extends TestCase
{
    use RefreshDatabase;

    public function test_get_poets(): void
    {
        $this->seed();

        $response = $this->get('/api/poets');

        $response
            ->assertHeader('content-type', 'application/json')
            ->assertStatus(200)
            ->assertJsonStructure([
                'poets' => [
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
                            ]
                        ]
                    ]
                ]
            ])
            ->assertJson(fn(AssertableJson $json) => $json
                ->whereAllType([
                    'poets' => 'array',

                    'poets.0.id' => 'integer',
                    'poets.0.birth_date' => 'string',
                    'poets.0.death_date' => 'string',
                    'poets.0.portrait_url' => 'string',

                    'poets.0.poet_data' => 'array',

                    'poets.0.poet_data.0.id' => 'integer',
                    'poets.0.poet_data.0.poet_id' => 'integer',
                    'poets.0.poet_data.0.language' => 'string',
                    'poets.0.poet_data.0.first_name' => 'string',
                    'poets.0.poet_data.0.last_name' => 'string',
                    'poets.0.poet_data.0.description' => 'string',
                ])
            );
    }
}
