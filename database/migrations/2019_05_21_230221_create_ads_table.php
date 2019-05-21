<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create( 'ads', function ( Blueprint $table ) {
            $table->bigIncrements( 'id' );
            $table->bigInteger( 'advertiser_id' )->unsigned();
            $table->bigInteger( 'campaign_id' )->unsigned();
            $table->string( 'title' );
            $table->longText( 'text' );
            $table->string( 'image' );
            $table->string( 'sponsored_by' );
            $table->string( 'tracking_url' );
            $table->timestamps();

            $table->foreign( 'advertiser_id' )->on( 'advertisers' )->references( 'id' );
            $table->foreign( 'campaign_id' )->on( 'campaigns' )->references( 'id' );
        } );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists( 'ads' );
    }
}
