<?php

namespace App\Http\Controllers;

use App\Models\Business;
use Illuminate\Http\Request;

class BusinessController extends Controller
{
    public function index(){
        $set = [
            'name'  => 'Lana Del Rey',
            'email' => 'lana_del_rey@gmail.com'
        ];

        $businesses = Business::find(3);
        $businesses->update($set);

        dd($businesses);
    }
}
