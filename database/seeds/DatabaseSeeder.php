<?php

use App\Models\Advertisement;
use App\Models\Advertiser;
use App\Models\Campaign;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        factory( Advertiser::class, 25 )->create()->each( function ( $advertiser ) {

            $advertiser->campaigns()->saveMany( factory( Campaign::class, rand(1,5) )->make( [

                'advertiser_id' => $advertiser->id,

            ] ) )->each( function ( $campaign ) use ( $advertiser ) {

                $campaign->ads()->saveMany( factory( Advertisement::class, rand(1,15) )->make( [

                    'advertiser_id' => $advertiser->id,

                ] ) );

            } );

        } );
    }
}
