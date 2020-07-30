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

class UsersController extends Controller
{  
    
    

    
        public function index(){
      
            $data = DB::table('users')->get();  
            return view('users/index',['data'=>$data]); 
        }

        public function create(){
            return view('users/create');
          }

        public function create_users(Request $request){
            $val = array(

              'name'            => $request->input('name'),
              'email'           => $request->input('email'),
              'phone'           => $request->input('phone'),
              'password'        => bcrypt($request->input('psw')),
              'created_at'      => new DateTime(),
              'updated_at'      => new DateTime(),

            );
        
            DB::table('users')->insert($val);  
            
    
            Session::flash('alert-insert','insert');
            return redirect('backoffice/users');
          }

        public function del($id){

            DB::table('users')->where('id',$id)->delete();
            return redirect('backoffice/users');
        }

        
        public function update($id){
            $data=DB::table('users')->where('id',$id)->first();
            return view('users/update',['data'=>$data]);
        }

        public function update_user(Request $request){
            $psw = '';
            if($request->input('psw')){
                $psw = bcrypt($request->input('psw'));
            }else{
                $psw = $request->input('oldpsw');
            }
    
            $data = array(
            'name'              => $request->input('name'),
            'email'             => $request->input('email'),
            'phone'             => $request->input('phone'),
            'password'          => $psw,
            'updated_at'        => new DateTime()
            );
    
            DB::table('users')->where('id',$request->input('id'))->update($data);
            Session::flash('alert-update','update');
    
            return redirect('backoffice/users');
        }










               
}




