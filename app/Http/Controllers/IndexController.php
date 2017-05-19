<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Json;
use App\Queries\UserQueries;

/**
 * @resource Class IndexController
 * Controller to handle the IndexPage
 * Bootstrap/Load data
 * @package App\Http\Controllers
 */
class IndexController extends Controller
{
    function __construct()
    {
    }

    /**
     * Load: Index page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function load( )
    {
        return view('index');
    }

    public function getSomething( Request $request, UserQueries $UserQueries){
        return Json::successOrFail( $UserQueries->getOneByEmail( $request->get('email') ) );
    }

}