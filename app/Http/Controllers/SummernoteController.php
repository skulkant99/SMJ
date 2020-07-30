<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use DateTime;
use Session;
use Response;
use Datatables;
use File;
use Folklore\Image\Facades\Image;
use PDF;
use Auth;

class SummernoteController extends Controller
{
    # insert img Editor
     public function postEditor(Request $request){
            $path = "assets/images/summernote/";
            $newname = '';
            if($_FILES['image']['name'] != ''){
                $newname = '';
                $cuttype = explode('.',$_FILES['image']['name']);
                $siezetype = sizeof($cuttype);
       $namenew = date('dmYHis').'EditorEvent.'.$cuttype[$siezetype-1];
                copy($_FILES['image']['tmp_name'],$path.$namenew);
            }
            $img = asset('assets/images/summernote/'.$namenew);
            return response()->json($img);

        }
}