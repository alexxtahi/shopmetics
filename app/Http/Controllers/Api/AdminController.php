<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin ;


class AdminController extends Controller
{
    public function index()
    {
        $admin = Admin::All() ;
        $array = Response()->json($admin) ;
        $reponse = compact("array") ;
        return $reponse ;
    }
}
