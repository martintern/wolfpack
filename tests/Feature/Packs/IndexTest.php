<?php

namespace Tests\Feature\Packs;

use App\Models\Pack;
use App\Models\Wolf;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class IndexTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function itListsPacks()
    {
        factory(Pack::class)->times(3)->create();

        $this->actingAs($this->user())->get('/api/packs')
            ->assertStatus(200)
            ->assertJsonCount(3);
    }

    /** @test */
    public function itListsEachPacksWolves()
    {
        $this->withoutExceptionHandling();
        factory(Pack::class)->create(['id' => 1]);
        factory(Wolf::class)->times(2)->create(['pack_id' => 1]);

        $this->actingAs($this->user())->get('/api/packs')
            ->assertStatus(200)
            ->assertJson([
                [
                    'wolves' => [
                        ['id' => 1],
                        ['id' => 2]
                    ]
                ]
            ]);
    }
}
