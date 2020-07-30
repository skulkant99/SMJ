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

class ActivitiesController extends Controller
{            

        public function index(){
            $data = DB::table('activities')->orderBy('created_at','desc')->get();
            return view('activities/index',['data'=>$data]); 
        }

        public function create(){
            return view('activities/create');
        }

        
        public function create_activities(Request $request){
        $bannerimg = '';
        if($request->hasFile('bannerimg')){
                $files 			    = $request->file('bannerimg');
                //$filename   = $files->getClientOriginalName();
                $filename 		    = $files->getClientOriginalName();
                $extension 		    = $files->getClientOriginalExtension();
                $size			    = $files->getSize();
                //filename to store
                $bannerimg 		    = date('YmdHis').rand().'.'.$extension;
                //path to store file
                $destinationPath    = base_path()."/assets/images/activities/";
                //storefile
                $files->move($destinationPath, $bannerimg);
                
        }
                $val=array(


                    'activities_date'                   => $request->input('date'),
                    'activities_topic_th'               => $request->input('topic_th'),
                    'activities_topic_en'               => $request->input('topic_en'),
                    'activities_detail_th'              => $request->input('detail_th'),
                    'activities_detail_en'              => $request->input('detail_en'),
                    'activities_img'                    => $bannerimg,
                    'created_at'                        => new DateTime,
                    'updated_at'                        => new DateTime,
                );


                DB::table('activities')->insert($val);

                Session::flash('alert-insert','insert');
                return redirect('backoffice/activities');
        }
                
        public function del_activities($id){

            $img = DB::table('activities')->where('activities_id',$id)->select('activities_img')->first();
            if($img){
            $destinationPath  = base_path()."/assets/images/activities/".$img->activities_img;
            if(is_file($destinationPath)){              
                unlink($destinationPath);
            }
    
        }
            DB::table('activities')->where('activities_id',$id)->delete();
            return redirect('backoffice/activities');
    }

        public function updated($id){
            $data=DB::table('activities')->where('activities_id',$id)->first();
            return view('activities/update',['data'=>$data]);

        }

        public function update_activities(Request $request){
            $bannerimg = '';
            if($request->hasFile('bannerimg')){
                $files 			    = $request->file('bannerimg');
                //$filename   = $files->getClientOriginalName();
                $filename 		    = $files->getClientOriginalName();
                $extension 		    = $files->getClientOriginalExtension();
                $size			    = $files->getSize();
                //filename to store
                $bannerimg 		    = date('YmdHis').rand().'.'.$extension;
                //path to store file
                $destinationPath    = base_path()."/assets/images/activities/";
                //storefile
                $files->move($destinationPath, $bannerimg);

                        
                    $img = DB::table('activities')->where('activities_id',$request->input('id'))->select('activities_img')->first();
                    if($img){
                    $destinationPath  = base_path()."/assets/images/activities/".$img->activities_img;
                    if(is_file($destinationPath)){              
                        unlink($destinationPath);

                    }
                }
            
            }
            else{
                $bannerimg  = $request->input('oldimg');
            }
                
            $val=array(

                'activities_date'                   => $request->input('date'),
                'activities_topic_th'               => $request->input('topic_th'),
                'activities_topic_en'               => $request->input('topic_en'),
                'activities_detail_th'              => $request->input('detail_th'),
                'activities_detail_en'              => $request->input('detail_en'),
                'activities_img'                    => $bannerimg,
                'updated_at'                        => new DateTime,

            );
            DB::table('activities')->where('activities_id',$request->input('id'))->update($val);

            Session::flash('alert-update','update');
            return redirect('backoffice/activities');
                
        }
        
}