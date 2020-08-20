<?php

namespace Tests\Feature\Wolves;

use App\Models\Wolf;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DestroyTest extends TestCase
{
    use RefreshDatabase;

    /** @test **/
    public function itRemovesWolves()
    {
        $this->withoutExceptionHandling();

        $this->actingAs($this->user())->delete('/api/wolves/1')
            ->assertStatus(201);

        $this->assertEquals(1, Wolf::count());
    }
}
