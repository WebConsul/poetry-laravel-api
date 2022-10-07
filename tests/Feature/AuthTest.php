<?php

//
//namespace Tests\Feature;
//
//use App\Models\User;
//use Illuminate\Foundation\Testing\RefreshDatabase;
//use Laravel\Sanctum\Sanctum;
//use Tests\TestCase;
//
//class AuthTest extends TestCase
//{
//    use RefreshDatabase;
//
//    public function test_successful_response_over_secure_route(): void
//    {
//        $user = User::factory()->create();
//        Sanctum::actingAs($user);
//
//        $response = $this->getJson('/api/user/me');
//
//        $response->assertOk();
//    }
//}
