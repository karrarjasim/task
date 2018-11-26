<?php

namespace App\Http\Controllers;
use App\Upload;
use Illuminate\Http\Request;

class MangerController extends Controller
{
    public function index(){
        $uploads=Upload::all();
        return view('manger.panel')->with('uploads',$uploads);
    }
}
