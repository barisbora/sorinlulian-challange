<?php namespace App\Helpers;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class API
{

    static function collection( AnonymousResourceCollection $collection, $message = null )
    {

        return $collection->additional( [
            'status'  => true,
            'code'    => 200,
            'message' => $message,
        ] );

    }

    static function success( $data, $message = null )
    {
        if ( $data instanceof LengthAwarePaginator ) {

            return response()->json( [
                'status'  => true,
                'code'    => 200,
                'message' => $message,
                'data'    => $data->items(),
                'meta'    => [
                    'current_page' => $data->currentPage(),
                    'last_page'    => $data->lastPage(),
                    'per_page'     => $data->perPage(),
                    'total'        => $data->total(),
                ],
            ], 200 );
        }

        return response()->json( [
            'status'  => true,
            'code'    => 200,
            'message' => $message,
            'data'    => $data,
        ], 200 );

    }

    static function error( $data, $message = null, $httpCode = 400 )
    {

        $response = [
            'status'  => false,
            'code'    => $httpCode,
            'message' => $message,
            'data'    => null,
        ];

        if ( $data ) $response[ 'data' ] = [
            'errors' => $data,
        ];

        return response()->json( $response, $httpCode );

    }

    public static function appends( array $availableAppends = [] )
    {
        $appends = request()->get( 'with', '' );
        $appends = preg_replace( '/\s+/', '', trim( $appends ) );
        $appends = explode( ',', $appends );

        return array_filter( $appends, function ( $item ) use ( $availableAppends ) {
            return in_array( $item, $availableAppends );
        } );
    }
}
