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

class CategoryController extends Controller
{  
    
    
//category/category
    
        public function index(){
      
            $data = DB::table('category')->get();  
            return view('category/category/index',['data'=>$data]); 
        }



        public function category_create(Request $request){
            $bannerimg = '';
            if($request->hasFile('bannerimg')){
                    $files 			    = $request->file('bannerimg');
                    $filename 		    = $files->getClientOriginalName();
                    $extension 		    = $files->getClientOriginalExtension();
                    $size			    = $files->getSize();
                    $bannerimg 		    = date('YmdHis').rand().'.'.$extension;
                    $destinationPath    = base_path()."/assets/images/categoryimg/";
                    $files->move($destinationPath, $bannerimg);
            }
                
             
                    $val=array(

                        'category_name_en'              => $request->input('name_en'),
                        'category_name_th'              => $request->input('name_th'),
                        'category_img'                  =>$bannerimg,
                        'created_at'                    => new DateTime,
                        'updated_at'                    => new DateTime,
                    );
                    DB::table('category')->insert($val);
                    Session::flash('alert-insert','insert');
                    return back();                
            }


        public function del_category($id){

                DB::table('category')->where('category_id',$id)->delete();
                return redirect('backoffice/category/category');
     }


     
        public function category_update($id){
            $data=DB::table('category')->where('category_id',$id)->get();
            $data2 = DB::table('category')->get();
            $categorysub = DB::table('categorysub')->get();
            $categorysub2 = DB::table('categorysub_2')->get();
            return view('category/category/update',['data'=>$data,'data2'=>$data2,
                                                    'categorysub'=>$categorysub,'categorysub2'=>$categorysub2]);

        }

        public function category_updated(Request $request){
            $bannerimg = '';
            $categoryid = DB::table('category')->latest()->first();
            if($request->hasFile('bannerimg')){
                     $files 			= $request->file('bannerimg');
                     $filename 		    = $files->getClientOriginalName();
                     $extension 		= $files->getClientOriginalExtension();
                     $size			    = $files->getSize();
                     $bannerimg 		= date('YmdHis').rand().'.'.$extension;
                     $destinationPath   = base_path()."/assets/images/categoryimg/";
                     $files->move($destinationPath, $bannerimg);
                     
                    $img = DB::table('category')->where('category_id',$request->input('id'))->select('category_img')->first();
                        if($img){
                        $destinationPath  = base_path()."/assets/images/category/".$img->category_img;
                        if(is_file($destinationPath)){              
                            unlink($destinationPath);
    
                        }
                    // DB::table('productimg')->where('productimg_id',$request->input('imgid'))->select('productimg_img')->delete();
                }
            }
            else{
                $bannerimg = $request->input('oldimg');
            }
    
           
            $val=array(


                'category_name_en'              => $request->input('name_en'),
                'category_name_th'              => $request->input('name_th'),
                'category_img'                  =>$bannerimg,
                'updated_at'                    => new DateTime,

    
    
            );
            DB::table('category')->where('category_id',$request->input('id'))->update($val);

            Session::flash('alert-update','update');
            return redirect('backoffice/category/category');
               
           }
    



//category/categorysub

        public function categorysub(){
            $data =  DB::table('categorysub')->leftjoin('category','categorysub.category_id','category.category_id')->get();
            $data2 = DB::table('category')->get();
            return view('category/categorysub/index',['data'=>$data,'data2'=>$data2]); 
        }

        
        public function ajax_createsub(Request $request){
           
                    $val=array(

                        'category_id'                      => $request->input('type'),
                        'categorysub_name_en'              => $request->input('name_en'),
                        'categorysub_name_th'              => $request->input('name_th'),
                        'created_at'                       => new DateTime,
                        'updated_at'                       => new DateTime,
                    );
                    DB::table('categorysub')->insert($val);
                    Session::flash('alert-insert','insert');
                    return back();                
            }



        public function del_categorysub($id){

                DB::table('categorysub')->where('categorysub_id',$id)->delete();
                return redirect('backoffice/category/categorysub');
     }

        public function categorysub_update($id){
                $data=DB::table('categorysub')->where('categorysub_id',$id)->get();
                return view('category/categorysub/update',['data'=>$data]);

        }

        public function categorysub_updated(Request $request){

                $val=array(

                    'category_id'                         => $request->input('type'),
                    'categorysub_name_en'                 => $request->input('name_en'),
                    'categorysub_name_th'                 => $request->input('name_th'),
                    'updated_at'                          => new DateTime,



                );
                DB::table('categorysub')->where('categorysub_id',$request->input('id'))->update($val);
        
                Session::flash('alert-update','update');
                return redirect('backoffice/category/categorysub');
                
            }

            




//category/categorysub2

        public function categorysub2(){
            $data =  DB::table('categorysub_2')->leftjoin('categorysub','categorysub_2.categorysub_id','categorysub.categorysub_id')->get();
            $data2 = DB::table('categorysub')->get();
            $data3 = DB::table('category')->get();
            return view('category/categorysub2/index',['data'=>$data,'data2'=>$data2,'data3'=>$data3]); 
        }

        
        public function ajax_createsub2(Request $request){
           
                    $val=array(

                        'categorysub_id'                   => $request->input('type'),
                        'categorysub_2_name_th'            => $request->input('name_en'),
                        'categorysub_2_name_en'            => $request->input('name_th'),
                        'created_at'                       => new DateTime,
                        'updated_at'                       => new DateTime,
                    );
                    DB::table('categorysub_2')->insert($val);
                    Session::flash('alert-insert','insert');
                    return back();                
            }



        public function del_categorysub2($id){

                DB::table('categorysub_2')->where('categorysub_2_id',$id)->delete();
                return redirect('backoffice/category/categorysub2');
     }

        public function categorysub_update2($id){
                $data2=DB::table('categorysub_2')->where('categorysub_2_id',$id)->get();
                $data3=DB::table('category')->get();
                return view('category/categorysub2/update',['data2'=>$data2,'data3'=>$data3]);

        }

        public function categorysub_updated2(Request $request){
            
    

                $val=array(

                    'categorysub_id'                      => $request->input('type'),
                    'categorysub_2_name_en'               => $request->input('name_en'),
                    'categorysub_2_name_th'               => $request->input('name_th'),
                    'updated_at'                          => new DateTime,



                );
                DB::table('categorysub_2')->where('categorysub_2_id',$request->input('id'))->update($val);
        
                Session::flash('alert-update','update');
                return redirect('backoffice/category/categorysub2');
                
            }









               
}