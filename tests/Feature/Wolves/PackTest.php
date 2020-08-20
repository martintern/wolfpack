<?php

namespace Tests\Feature\Wolves;

use App\Models\Pack;
use App\Models\Wolf;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PackTest extends TestCase
{
    use RefreshDatabase;

    /** @test **/
    public function itAssignsWolfToPack()
    {
        $wolf = factory(Wolf::class)->create(['id' => 1]);
        $pack = factory(Pack::class)->create(['id' => 1]);

        $this->actingAs($this->user())->put('api/wolves/1', [
            'pack_id' => 1
        ])->assertStatus(200);

        $this->assertEquals($wolf->fresh(), $pack->wolves()->first());
        $this->assertEquals($pack->fresh(), $wolf->fresh()->pack);
    }

    /** @test **/
    public function itValidatesPackId()
    {
        $wolf = factory(Wolf::class)->create(['id' => 1]);
        $pack = factory(Pack::class)->create(['id' => 1]);

        $this->actingAs($this->user())->put('api/wolves/1', [
            'pack_id' => 2
        ])->assertStatus(302);

        $this->assertNull($wolf->pack);
    }

    /** @test */
    public function itRemovesWolfFromPack()
    {
        $pack = factory(Pack::class)->create(['id' => 1]);
        factory(Wolf::class)->times(2)->create(['pack_id' => 1]);

        $this->actingAs($this->user())->put('api/wolves/1', [
            'pack_id' => null
        ])->assertStatus(200);

        $this->assertEquals([2], $pack->wolves()->pluck('id')->toArray());
    }
}
