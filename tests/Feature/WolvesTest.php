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
        factory(Wolf::class)->times(3)->create();

        $this->actingAs($this->user())->get('/api/wolves')
            ->assertStatus(200)
            ->assertJsonCount(3);
    }

    /** @test **/
    public function itIncludesBasicInformation()
    {
        $this->withoutExceptionHandling();

        factory(Wolf::class)->create([
            'name' => 'Martin',
            'gender' => 'male',//TODO: enum?
            'birthdate' => '1978-02-10'
        ]);

        $this->actingAs($this->user())->get('/api/wolves')
            ->assertStatus(200)
            ->assertJsonCount(1)
            ->assertJsonFragment([
                'name' => 'Martin',
                'gender' => 'male',
                'birthdate' => '1978-02-10'
            ]);
    }

    private function user(): User
    {
        return factory(User::class)->make();
    }
}
