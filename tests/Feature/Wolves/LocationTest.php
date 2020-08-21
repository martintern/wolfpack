<?php

namespace Tests\Feature\Wolves;

use App\Models\Wolf;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LocationTest extends TestCase
{
    use RefreshDatabase;

    /** @test **/
    public function allWolvesRequireLocation()
    {
        $this->actingAs($this->user())->post('/api/wolves', [
            'name' => 'Martin',
            'gender' => 'male',
            'birthdate' => '1978-02-10',
            'location' => null
        ])->assertStatus(302);

        $this->assertEquals(0, Wolf::count());
    }
}
