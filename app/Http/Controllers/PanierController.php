<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PanierController extends Controller
{

    public function addStrore(){

        session([
            'key1' => 'value1',
            'key2' => 'value2',
            'key3' => 'value3',
            'key4' => 'value4',
        ]);

        return view('boutique') ;

    }

    public function destroyStore(){

        $data = $request->session()->all();

        if ($request->session()->has('data')) {
            dd('ok') ;
            
        }else{
            dd('no') ;
        }

        return view('boutique') ;

    }

    public function updateStore(){

    }

}
