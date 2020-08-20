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
        factory(Wolf::class)->times(2)->create();

        $this->actingAs($this->user())->delete('/api/wolves/1')
            ->assertStatus(200);

        $this->assertEquals(1, Wolf::count());
    }
}
