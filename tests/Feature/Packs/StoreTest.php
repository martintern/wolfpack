<?php

namespace Tests\Feature\Packs;

use App\Models\Pack;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class StoreTest extends TestCase
{
    use RefreshDatabase;

    /** @test **/
    public function itAddsNewPacks()
    {
        $this->actingAs($this->user())->post('/api/packs', [
            'name' => 'The Wanderers'
        ])->assertStatus(201);

        $this->assertEquals('The Wanderers', Pack::first()->name);
    }
}
