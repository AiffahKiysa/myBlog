<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    public function input(){
        return view('formulir');
    }

    public function proses(Request $request){
        $this->validate($request, [
            'name'=> 'required|min:3|max:100',
            'city'=> 'required|min:4|max:20',
            'hobby'=> 'required'
        ]);

        return view('proses', ['data' => $request]);
    }
}
