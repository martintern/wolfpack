<?php

namespace Tests\Feature\Wolves;

use App\Models\Wolf;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class IndexTest extends TestCase
{
    use RefreshDatabase;

    /** @test **/
    public function itListsAllWolves()
    {
        factory(Wolf::class)->times(3)->create();

        $this->actingAs($this->user())->get('/api/wolves')
            ->assertStatus(200)
            ->assertJsonCount(3);
    }

    /** @test **/
    public function itIncludesBasicInformation()
    {
        factory(Wolf::class)->create([
            'name' => 'Martin',
            'gender' => 'male',
            'birthdate' => '1978-02-10'
        ]);

        $this->actingAs($this->user())->get('/api/wolves')
            ->assertStatus(200)
            ->assertJsonFragment([
                'name' => 'Martin',
                'gender' => 'male',
                'birthdate' => '1978-02-10'
            ]);
    }
}
