<?php

namespace Tests\Feature;

use App\Models\Poet;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Tests\Feature\JsonStructure\PoemStructure;
use Tests\TestCase;

class PoetPoemTest extends TestCase
{
    public function test_get_poem_by_correct_slugs(): void
    {
        $poetSlug = Str::slug('Poet slug');
        $poemSlug = Str::slug('Poem slug');

        Poet::factory()
            ->hasPoetData(3)
            ->hasPoems(1, ['slug' => $poemSlug])
            ->create([
                'slug' => $poetSlug,
            ]);

        $response = $this->getJson(route('poets.poems.show', [$poetSlug, $poemSlug]));
        $response->assertHeader('content-type', 'application/json')
            ->assertStatus(200)
            ->assertJsonStructure(['data' => PoemStructure::getStructure()]);

        $this->assertEquals($poemSlug, Arr::get($response->decodeResponseJson(), 'data.slug'));
        $this->assertEquals($poetSlug, Arr::get($response->decodeResponseJson(), 'data.poet.slug'));
    }

    public function test_get_poem_by_without_correct_poet_slug(): void
    {
        $poetSlug = Str::slug('Poet slug');
        $poemSlug = Str::slug('Poem slug');

        Poet::factory()
            ->hasPoetData(3)
            ->hasPoems(1, ['slug' => $poemSlug])
            ->create([
                'slug' => $poetSlug,
            ]);


        $this->getJson(route('poets.poems.show', ['not-correct-slug', $poemSlug]))
            ->assertHeader('content-type', 'application/json')
            ->assertNotFound();
    }

    public function test_get_poem_by_without_correct_poem_slug(): void
    {
        $poetSlug = Str::slug('Poet slug');
        $poemSlug = Str::slug('Poem slug');

        Poet::factory()
            ->hasPoetData(3)
            ->hasPoems(1, ['slug' => $poemSlug])
            ->create([
                'slug' => $poetSlug,
            ]);


        $this->getJson(route('poets.poems.show', [$poetSlug, 'not-correct-slug']))
            ->assertHeader('content-type', 'application/json')
            ->assertNotFound();
    }
}
