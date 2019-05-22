<?php

namespace App\Http\Controllers;

use App\Helpers\API;
use App\Http\Resources\AdvertiserResource;
use App\Models\Advertiser;
use Illuminate\Http\Request;

class AdvertiserController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $advertisers = Advertiser::latest()->paginate( 20 );

        return API::success( AdvertiserResource::collection( $advertisers ) );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Not wanted in challendge.md
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store( Request $request )
    {
        // Not wanted in challendge.md
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show( $id )
    {
        // Not wanted in challendge.md
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
        // Not wanted in challendge.md
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id )
    {
        // Not wanted in challendge.md
    }
}
