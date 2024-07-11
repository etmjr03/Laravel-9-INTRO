<?php

namespace App\Http\Controllers;

use App\Models\Business;
use Illuminate\Http\Request;

class BusinessController extends Controller
{
    public function index(){
        $businesses = Business::create([
            'name' => 'Lana Del Rey',
            'email' => 'lana.del.rey@gmail.com'
        ]);

        dd($businesses);
    }
}
