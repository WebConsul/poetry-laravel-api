<?php

namespace Tests\Feature;

use Tests\TestCase;

class IndexTest extends TestCase
{
    /**
     * Корневой адрес возвращает успешный ответ
     *
     * @return void
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->getJson('/api');

        $response->assertOk();
        $response->assertJson(['name' => 'Poetry Laravel API']);
    }
}
