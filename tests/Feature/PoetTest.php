<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PoetTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Тест для получения поэтов по api.
     *
     * @return void
     */
    public function test_get_poets(): void
    {
        $response = $this->getJson('/api/poets');
        $response->assertOk();
    }
}
