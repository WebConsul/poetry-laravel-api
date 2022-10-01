<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SwaggerTest extends TestCase
{
    public function test_documentation_page_returns_success_status(): void
    {
        $response = $this->get('api/documentation');

        $response->assertOk();
    }
}
