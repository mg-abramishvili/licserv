<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index() {
        //return Client::all();
        return Client::with('getKeyRelation')->get();
    }
}
