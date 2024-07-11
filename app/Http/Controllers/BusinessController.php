<?php

namespace App\Http\Controllers;

use App\Models\Business;
use Illuminate\Http\Request;
use DB;

class BusinessController extends Controller
{
    public function index(){
        \DB::connection()->enableQueryLog();

        $businesses = Business::find(4);
        $query = \DB::getQueryLog();

        dd($query);
    }
}
