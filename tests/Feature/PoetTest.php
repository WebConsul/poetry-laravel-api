<?php

namespace Tests\Feature;

use App\Models\Collection;
use App\Models\Poet;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\Feature\JsonStructure\PaginatedList;
use Tests\Feature\JsonStructure\PaginatedPoetList;
use Tests\Feature\JsonStructure\PoetStructure;
use Tests\TestCase;

class PoetTest extends TestCase
{
    use RefreshDatabase;

    public function test_get_all_poets_with_per_page_by_default(): void
    {
        $this->seed();

        $response = $this->getJson('/api/poets');

        $response
            ->assertHeader('content-type', 'application/json')
            ->assertStatus(200)
            ->assertJsonStructure(PaginatedPoetList::getStructure())
            ->assertJson(fn (AssertableJson $json) => $json
                ->whereAllType(array_merge(PaginatedList::getTypes(), PaginatedPoetList::getTypes()))
            )
            ->assertJsonPath('per_page', intval(config('pagination.per_page.poets')));
    }

    public function test_get_all_poets_with_per_page_equals_3(): void
    {
        $this->seed();

        $response = $this->getJson('/api/poets?per_page=3');

        $response
            ->assertHeader('content-type', 'application/json')
            ->assertStatus(200)
            ->assertJsonStructure(PaginatedPoetList::getStructure())
            ->assertJson(fn (AssertableJson $json) => $json
                ->whereAllType(array_merge(PaginatedList::getTypes(), PaginatedPoetList::getTypes()))
            )
            ->assertJsonPath('per_page', 3);
    }

    public function test_get_all_poets_with_too_big_per_page_value(): void
    {
        $this->seed();

        $response = $this->getJson('/api/poets?per_page=30000000');

        $response
            ->assertHeader('content-type', 'application/json')
            ->assertStatus(422)
            ->assertJson(fn (AssertableJson $json) => $json
                ->has('message')
                ->has('errors')
                ->has('errors.per_page')
                ->missing('data')
                ->whereAllType(
                    [
                        'message' => 'string',
                        'errors' => 'array',
                        'errors.per_page' => 'array',
                    ]
                )
            );
    }

    public function test_get_poet_by_slug_with_correct_slug(): void
    {
        $slug = Str::slug('Poet firstname lastname');
        $poet = Poet::factory()
            ->hasPoetData(3)
            ->hasPoems(3)
            ->create([
                'slug' => $slug
            ]);

        $poet->collections()->sync(Collection::factory()->create()->id);

        $response = $this->getJson(route('poet.show', ['slug' => $slug]));
        $response->assertHeader('content-type', 'application/json')
            ->assertStatus(200)
            ->assertJsonStructure(['data' => PoetStructure::getPoetStructureWithPoemsAndCollections()])
            ->assertJsonCount(3, 'data.poet_data')
            ->assertJsonCount(3, 'data.poems');

        $this->assertEquals($slug, Arr::get($response->decodeResponseJson(), 'data.slug'));
    }

    public function test_get_poet_by_slug_without_correct_slug(): void
    {
        $slug = Str::slug('Poet firstname lastname');

        $this->getJson(route('poet.show', ['slug' => $slug]))
            ->assertHeader('content-type', 'application/json')
            ->assertNotFound();

    }
}
