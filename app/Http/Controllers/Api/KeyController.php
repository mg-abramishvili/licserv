<?php

namespace App\Http\Controllers\Api;

use App\Models\Key;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KeyController extends Controller
{
    public function index() {
        return Key::all();
    }
}
