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
            'birthdate' => '1978-02-10',
            'location' => '51.4416, 5.4697'
        ])->assertStatus(201);

        /**
         * TODO: composer require dms/phpunit-arraysubset-asserts --dev
         * when upgrading to PHPUNIT 9 because it deprecates this assert
         * https://packagist.org/packages/dms/phpunit-arraysubset-asserts
         */
        $this->assertArraySubset([
            'name' => 'Martin',
            'gender' => 'male',
            'birthdate' => '1978-02-10',
            'location' => '51.4416, 5.4697'
        ], Wolf::first()->getAttributes());
    }

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
