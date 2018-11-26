<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Upload;
use File;
use Illuminate\Support\Facades\Auth;

use DB;
class UploadController extends Controller
{
    public function upload(Request $request){
        $this->validate($request,[
            'title'=>'required',
            'file'=>'required|mimes:jpeg,bmp,png,gif,svg,pdf'
        ]);

        if ($request->hasFile('file')){
            $fileExt = $request->file('file')->getClientOriginalExtension();
            $filename = time().'uploads.'.$fileExt;
            $request->file('file')->move(public_path() . '/uploads', $filename);
            $fsize= File::size(public_path("/uploads/$filename"));

        }
        function formatBytes($bytes, $precision = 2) { 
            $units = array('B', 'KB', 'MB', 'GB', 'TB'); 
        
            $bytes = max($bytes, 0); 
            $pow = floor(($bytes ? log($bytes) : 0) / log(1024)); 
            $pow = min($pow, count($units) - 1); 
        
            // Uncomment one of the following alternatives
            $bytes /= pow(1024, $pow);
            // $bytes /= (1 << (10 * $pow)); 
        
            return round($bytes, $precision) . ' ' . $units[$pow]; 
        } 

        $upload = new Upload();
        $upload->title=$request->input('title');
        $upload->file = $filename;
        $upload->user_id=auth()->user()->id;
        $upload->uploader_name=auth()->user()->name;
        $upload->file_size=formatBytes($fsize);
        $upload->file_extension=$fileExt;
        $upload->save();
        return redirect()->back()->with('message', 'file uploaded !');   




    }
    public function show_all(){
        $uploads = DB::table('uploads')->get();
       return view('user.uploads')->with('uploads',$uploads);
    }
    public function delete($id){
        $user = Upload::find($id);
        $user->delete();
        return back();
    }
}
