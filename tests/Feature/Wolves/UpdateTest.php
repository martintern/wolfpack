<?php

namespace Tests\Feature\Wolves;

use App\Models\Wolf;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UpdateTest extends TestCase
{
    use RefreshDatabase;

    /** @test **/
    public function itUpdatesWolves()
    {
        factory(Wolf::class)->create([
            'name' => 'Martin',
            'gender' => 'male',
            'birthdate' => '1978-02-10'
        ]);

        $this->actingAs($this->user())->put('/api/wolves/1', [
            'name' => 'Sandra',
            'gender' => 'female',
            'birthdate' => '1979-05-29'
        ])->assertStatus(200);

        /**
         * TODO: composer require dms/phpunit-arraysubset-asserts --dev
         * when upgrading to PHPUNIT 9 because it deprecates this assert
         * https://packagist.org/packages/dms/phpunit-arraysubset-asserts
         */
        $this->assertArraySubset([
            'name' => 'Sandra',
            'gender' => 'female',
            'birthdate' => '1979-05-29'
        ], Wolf::first()->getAttributes());
    }
}
