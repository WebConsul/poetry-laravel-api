<?php
//
//
//namespace Tests\Feature;
//
//use Illuminate\Foundation\Testing\RefreshDatabase;
//use Illuminate\Testing\Fluent\AssertableJson;
//use Tests\Feature\JsonStructure\PaginatedList;
//use Tests\Feature\JsonStructure\PaginatedPoetList;
//use Tests\TestCase;
//
//class PoetTest extends TestCase
//{
//    use RefreshDatabase;
//
//    public function test_get_all_poets_with_per_page_by_default(): void
//    {
//        $this->seed();
//
//        $response = $this->getJson('/api/poets');
//
//        $response
//            ->assertHeader('content-type', 'application/json')
//            ->assertStatus(200)
//            ->assertJsonStructure(PaginatedPoetList::getStructure())
//            ->assertJson(fn (AssertableJson $json) => $json
//                ->whereAllType(array_merge(PaginatedList::getTypes(), PaginatedPoetList::getTypes()))
//            )
//            ->assertJsonPath('per_page', intval(config('pagination.per_page.poets')));
//    }
//
//    public function test_get_all_poets_with_per_page_equals_3(): void
//    {
//        $this->seed();
//
//        $response = $this->getJson('/api/poets?per_page=3');
//
//        $response
//            ->assertHeader('content-type', 'application/json')
//            ->assertStatus(200)
//            ->assertJsonStructure(PaginatedPoetList::getStructure())
//            ->assertJson(fn (AssertableJson $json) => $json
//                ->whereAllType(array_merge(PaginatedList::getTypes(), PaginatedPoetList::getTypes()))
//            )
//            ->assertJsonPath('per_page', 3);
//    }
//
//    public function test_get_all_poets_with_too_big_per_page_value(): void
//    {
//        $this->seed();
//
//        $response = $this->getJson('/api/poets?per_page=30000000');
//
//        $response
//            ->assertHeader('content-type', 'application/json')
//            ->assertStatus(422)
//            ->assertJson(fn (AssertableJson $json) => $json
//                ->has('message')
//                ->has('errors')
//                ->has('errors.per_page')
//                ->missing('data')
//                ->whereAllType(
//                    [
//                        'message' => 'string',
//                        'errors' => 'array',
//                        'errors.per_page' => 'array',
//                    ]
//                )
//            );
//    }
//}
