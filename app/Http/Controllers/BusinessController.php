<?php

namespace App\Http\Controllers;

use App\Models\Business;
use Illuminate\Http\Request;

class BusinessController extends Controller
{
    public function index(){
        $businesses = Business::all();
        $businessesPorId = Business::find(1);
        $businessesPorCondicao = Business::where('name', 'teste')->get();

        dd($businessesPorCondicao);
    }
}
