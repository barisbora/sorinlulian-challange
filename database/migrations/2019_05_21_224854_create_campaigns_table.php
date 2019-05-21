<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCampaignsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create( 'campaigns', function ( Blueprint $table ) {
            $table->bigIncrements( 'id' );
            $table->bigInteger( 'advertiser_id' )->unsigned();
            $table->string( 'name' );
            $table->timestamps();

            $table->foreign( 'advertiser_id' )->on( 'advertisers' )->references( 'id' );
        } );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists( 'campaigns' );
    }
}
