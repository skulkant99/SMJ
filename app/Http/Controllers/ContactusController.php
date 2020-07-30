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
use Mail;


class ContactusController extends Controller
{            
    
        public function index(){
            $data = DB::table('contactus')->orderBy('created_at','desc')->get();
            return view('contactus/index',['data'=>$data]); 
        }


}
