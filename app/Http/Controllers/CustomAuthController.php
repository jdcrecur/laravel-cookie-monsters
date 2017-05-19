<?php
namespace App\Http\Controllers;

use Cookie;
use Auth, Log, Session;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

use App\Models\User;


class CustomAuthController extends Controller{

    protected $UserQueries;
    protected $UserOptionQueries;
    protected $EventQueries;
    protected $MarketQueries;
    protected $RoleQueries;
    protected $LdapService;

    /**
     * CustomAuthController constructor.
     */
    function __construct()
    {
    }

    function authenticate( Request $request ){

        $data = $request->all();


        $user = User::where('email', $data['user_name'] )->first();

        if( $user ){
            Auth::login( $user );
            return Json::success( $user );
        } else {
            return Json::fail( );
        }
    }



    function logout(){

        Auth::logout();

        //now physically drop the cookie from the database
        return Json::success();
    }



}