<?php

namespace Tests\Feature;

use Tests\TestCase;

class SwaggerTest extends TestCase
{
    public function test_documentation_page_returns_success_status(): void
    {
        $response = $this->get('api/documentation');

        $response->assertOk();
    }

    public function test_api_docs_json_returns_valid_response(): void
    {
        $response = $this->getJson('docs/api-docs.json');

        $response->assertOk();

        $response->assertJson([
            'openapi' => true,
            'info' => true,
            'paths' => true,
        ]);
    }
}
