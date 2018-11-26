<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Upload;
use DB;
class AdminController extends Controller
{
    public function index(){
        $users=User::all();
        return view('admin.userinfo')->with('users',$users);
    }
    public function show_info(){
        $uploads=Upload::all();
        return view('admin.uploadsinfo')->with('uploads',$uploads);
    }
    public function forward_file($id){
        DB::table('uploads')
            ->where('id', $id)
            ->update(['status' => 0]);
            return back();
    }
    public function make_manger($id){
        DB::table('roles_users')
            ->where('id', $id)
            ->update(['role_id' => 2]);
            return back();
    }
}
