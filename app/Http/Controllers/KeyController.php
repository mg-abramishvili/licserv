<?php

namespace App\Http\Controllers;

use App\Models\Key;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class KeyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()) {
            return Key::latest()->paginate(20);
        } else {
            return "Доступ запрещен!";
        }
    }

    public function add(Request $request)
    {

        $generate1 = \Str::random(4);
        $generate2 = \Str::random(4);
        $generate3 = \Str::random(4);
        $generate4 = \Str::random(4);

        $key = new Key([
            'key' => \Str::upper($generate1."-".$generate2."-".$generate3."-".$generate4),
            'status' => 'waiting',
            'comment' => $request->get('comment'),
        ]);
        $key->save();

        return response()->json('The key successfully added');
    }

    public function edit($id)
    {
        if (Auth::user()) {
            $key = Key::find($id);
            return response()->json($key);
        } else {
            return "Доступ запрещен!";
        }
    }

    public function update($id, Request $request)
    {
        if (Auth::user()) {
            $key = Key::find($id);
            $key->update($request->all());
            return response()->json('The key successfully updated');
        } else {
            return "Доступ запрещен!";
        }
    }

    public function activate($key, Request $request)
    {
        $key = Key::where('key', '=', $key)->firstOrFail();
        $key->update($request->all());

        return response()->json('The key successfully updated');
    }

    public function view($key)
    {
        $key = Key::where('key', '=', $key)->firstOrFail();
        return response()->json($key);
    }

    public function delete($id)
    {
        if (Auth::user()) {
            $key = Key::find($id);
            $key->delete();
            return response()->json('The key successfully deleted');
        } else {
            return "Доступ запрещен!";
        }
    }
}
