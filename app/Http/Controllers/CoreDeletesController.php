<?php

namespace App\Http\Controllers;
use View;
use App\Models\imagetable;
use Illuminate\Http\Request;
use Storage;
use DB;
use App\Http\Controllers\Controller;
class CoreDeletesController extends Controller
{
  
    public function imageDelete(Request $request){
        if($request->has('src')){
            $imagetable = imagetable::where('img_path',$request->src)->first();
            if($imagetable){
                if($imagetable->delete()){
                    Storage::disk('public')->deleteDirectory(dirname($request->src));
                    echo json_encode(array('status'=>'1','data'=>'Image Deleted'));
                    return;
                }
            }
        }
        echo json_encode(array('status'=>'0','data'=>'Unable to delete Image'));
    }
    public function deleteResizedImage($id){
        //dd($id);
        return Storage::disk('public')->deleteDirectory('Uploads/resized/'.$id);
    }
}
