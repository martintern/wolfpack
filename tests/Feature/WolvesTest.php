<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Wolf;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class WolvesTest extends TestCase
{
    use RefreshDatabase;

    /** @test **/
    public function itListsAllWolves()
    {
        $this->withoutExceptionHandling();

        $wolves = factory(Wolf::class)->times(3)->create();
        $user = factory(User::class)->create();

        $this->actingAs($user)->get('/api/wolves')
            ->assertStatus(200)
            ->assertJsonCount(3);
    }
}
