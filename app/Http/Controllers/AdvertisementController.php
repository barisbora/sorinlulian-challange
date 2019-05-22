<?php

namespace App\Http\Controllers;

use App\Helpers\API;
use App\Http\Resources\AdvertisementResource;
use App\Models\Advertisement;
use App\Models\Campaign;
use Illuminate\Http\Request;

class AdvertisementController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index( Request $request )
    {

        $advertisement = Advertisement::query();

        $filters = $request->validate( [
            'campaign_id'   => 'nullable|integer|exists:campaigns,id',
            'advertiser_id' => 'nullable|integer|exists:advertisers,id',
        ] );

        foreach ( $filters as $field => $value ) {
            $advertisement->where( $field, $value );
        }

        $advertisement->with( API::appends( [ 'advertiser', 'campaign' ] ) );

        return API::success( $advertisement->latest()->paginate( 20 ) );

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store( Request $request )
    {

        $data = $request->validate( [
            'campaign_id'  => 'required|integer|exists:campaigns,id',
            'title'        => 'required|string|min:1|max:225',
            'text'         => 'required|string|min:1|max:5000',
            'image'        => 'required|string|url',
            'sponsored_by' => 'required|string|min:5|max:225',
            'tracking_url' => 'required|string|url',
        ] );

        $campaign = Campaign::findOrFail( $request->campaign_id );

        $data[ 'advertiser_id' ] = $campaign->advertiser_id;

        $advertisement = Advertisement::create( $data );

        return API::success( AdvertisementResource::make( $advertisement ) );

    }

    /**
     * Display the specified resource.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int                     $id
     * @return \Illuminate\Http\Response
     */
    public function show( Request $request, $id )
    {
        return API::success( AdvertisementResource::make( Advertisement::findOrFail( $id ) ) );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int                      $id
     * @return \Illuminate\Http\Response
     */
    public function update( Request $request, $id )
    {
        $data = $request->validate( [
            'campaign_id'  => 'nullable|integer|exists:campaigns,id',
            'title'        => 'nullable|string|min:1|max:225',
            'text'         => 'nullable|string|min:1|max:5000',
            'image'        => 'nullable|string|url',
            'sponsored_by' => 'nullable|string|min:5|max:225',
            'tracking_url' => 'nullable|string|url',
        ] );

        $advertisement = Advertisement::findOrFail( $id );

        if ( $request->has( 'campaign_id' ) ) {

            $campaign = Campaign::findOrFail( $request->campaign_id );
            $data[ 'advertiser_id' ] = $campaign->advertiser_id;

        }

        $advertisement->update( $data );

        return API::success( AdvertisementResource::make( $advertisement ) );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id )
    {
        $advertisement = Advertisement::findOrFail( $id );

        $advertisement->delete();

        return API::success( [
            'deleted' => true,
        ] );
    }
}
