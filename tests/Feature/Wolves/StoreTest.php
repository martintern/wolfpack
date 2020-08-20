<?php

namespace Tests\Feature\Wolves;

use App\Models\Wolf;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class StoreTest extends TestCase
{
    use RefreshDatabase;

    /** @test **/
    public function itAddsNewWolves()
    {
        $this->actingAs($this->user())->post('/api/wolves', [
            'name' => 'Martin',
            'gender' => 'male',
            'birthdate' => '1978-02-10'
        ])->assertStatus(201);

        $this->assertEquals(1, Wolf::count());
    }
}
