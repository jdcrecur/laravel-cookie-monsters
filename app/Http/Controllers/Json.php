<?php

namespace App\Http\Controllers;

use App\Http\Requests;

/**
 * @resource Class Json
 * Controller that provides helper functions for JSON
 *
 * @package App\Http\Controllers
 */

class Json extends Controller
{
    /**
     * @param $success
     * @param $payload
     * @return \Illuminate\Http\JsonResponse
     */
    private static function outPut( $success, $payload )
    {
        return response()->json([
            'success' => $success,
            'payload' => $payload
        ]);
    }

    /**
     * @param array $payload
     * @return \Illuminate\Http\JsonResponse
     */
    static function success( $payload = array() )
    {
        return self::outPut(true, $payload);
    }

    /**
     * @param array $payload
     * @return \Illuminate\Http\JsonResponse
     */
    static function fail( $payload = array() )
    {
        return self::outPut(false, $payload);
    }

    /**
     * If no $payload is passed then the $success param is used in its place.
     * @param bool $success
     * @param null $payload
     * @return \Illuminate\Http\JsonResponse
     */
    static function successOrFail( $success = false, $payload = null )
    {
        if( $payload === null ){
            $payload = $success;
        }

        if( $success ){
            return self::success( $payload );
        } else {
            return self::fail( $payload );
        }
    }
}
