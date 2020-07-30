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

class ReferencesController extends Controller
{            
    


//references

                        public function index(){
                            $data = DB::table('references')->get();
                            $data = DB::table('references')->leftjoin('type','references.references_type','type.type_id')->get(); 
                            return view('references/index',['data'=>$data]); 
                        }

                        public function create(){
                            $data2 = DB::table('type')->get();
                            return view('references/create',['data2'=>$data2]);
                        }

                        public function create_references(Request $request){
                            //insert product coverimg
                          
                        $bannerimg = '';
                        if($request->hasFile('bannerimg')){
                                 $files 			= $request->file('bannerimg');
                                 $filename 		    = $files->getClientOriginalName();
                                 $extension 		= $files->getClientOriginalExtension();
                                 $size			    = $files->getSize();
                                 $bannerimg 		= date('YmdHis').rand().'.'.$extension;
                                 $destinationPath   = base_path()."/assets/images/references/";
                                 $files->move($destinationPath, $bannerimg);
                        }
                
                            $val=array(
                              
                                'references_type'               => $request->input('type'),
                                'references_name_th'            => $request->input('name_th'),
                                'references_name_en'            => $request->input('name_en'),
                                'references_detail_th'          => $request->input('detail_th'),
                                'references_detail_en'          => $request->input('detail_en'),
                                'references_img'                =>$bannerimg,
                                'created_at'                    => new DateTime,
                                'updated_at'                    => new DateTime,
                            );
                
                            
                            DB::table('references')->insert($val);      
                
                                $fileimg = "";
                                $referencesid = DB::table('references')->orderBy('created_at','desc')->first();
                                if($request->file('newsgallery')){
                                   foreach($request->file('newsgallery') as $key => $value){
                                       $filename         = $value->getClientOriginalName();
                                       $extension        = $value->getClientOriginalExtension();
                                       $size             = $value->getSize();
                                       $fileimg          = date('YmdHis').rand().'.'.$extension;
                                       $destinationPath  = base_path()."/assets/images/referencesimg/";
                                       $value->move($destinationPath, $fileimg);
                    
                                       $val = array(

                                       'references_id'            => $referencesid->references_id,
                                       'referencesimg_img'        => $fileimg,
                                       'referencesimg_name_th'    => $request->input('name_tha')[$key],
                                       'created_at'               => new DateTime,
                                       'updated_at'               => new DateTime
                                     );
                                       DB::table('referencesimg')->insert($val);
                                   }
                               }
                           
                            Session::flash('alert-insert','insert');
                            return redirect('backoffice/references');
                        }

                            public function del_references($id){
                
                                $img = DB::table('references')->where('references_id',$id)->select('references_img')->first();
                                if($img){
                                $destinationPath  = base_path()."/assets/images/references/".$img->references_img;
                                if(is_file($destinationPath)){              
                                    unlink($destinationPath);
                                }
                        
                            }
                                DB::table('references')->where('references_id',$id)->delete();
                                return redirect('backoffice/references');
                        }

                            public function updated($id){
                                $data=DB::table('references')->where('references_id',$id)->first();
                                $data2 = DB::table('type')->get();
                                $referencesimg =DB::table('referencesimg')->where('references_id',$id)->get();

                                return view('references/update',['data'=>$data,'referencesimg'=>$referencesimg,'data2'=>$data2]);
                
                            }

                            public function update_references(Request $request){
                                $bannerimg = '';
                                $referencesid = DB::table('references')->latest()->first();
                                if($request->hasFile('bannerimg')){
                                         $files 			= $request->file('bannerimg');
                                         $filename 		    = $files->getClientOriginalName();
                                         $extension 		= $files->getClientOriginalExtension();
                                         $size			    = $files->getSize();
                                         $bannerimg 		= date('YmdHis').rand().'.'.$extension;
                                         $destinationPath   = base_path()."/assets/images/references/";
                                         $files->move($destinationPath, $bannerimg);
                                         
                                        $img = DB::table('references')->where('references_id',$request->input('id'))->select('references_img')->first();
                                            if($img){
                                            $destinationPath  = public_path()."/assets/images/references/".$img->references_img;
                                            if(is_file($destinationPath)){              
                                                unlink($destinationPath);
                        
                                            }
                                      
                                    }
                                }
                                else{
                                    $bannerimg = $request->input('oldimg');
                                }
                                
                        
                        
                                $val=array(


                                    'references_type'               => $request->input('type'),
                                    'references_name_th'            => $request->input('name_th'),
                                    'references_name_en'            => $request->input('name_en'),
                                    'references_detail_th'          => $request->input('detail_th'),
                                    'references_detail_en'          => $request->input('detail_en'),
                                    'references_img'                =>$bannerimg,
                                    'updated_at'                    => new DateTime,

                        
                        
                                );
                                DB::table('references')->where('references_id',$request->input('id'))->update($val);
                        
                                        $fileimg = "";
                                        if($request->file('newsgallery')){
                                           foreach($request->file('newsgallery') as $key => $value){
                                               $filename         = $value->getClientOriginalName();
                                               $extension        = $value->getClientOriginalExtension();
                                               $size             = $value->getSize();
                                               $fileimg          = date('YmdHis').rand().'.'.$extension;
                                               $destinationPath  = base_path()."/assets/images/referencesimg/";
                                               $value->move($destinationPath, $fileimg);
                            
                                               $val = array(
                                                   
                                                'references_id'            => $request->input('id'),
                                                'referencesimg_img'        => $fileimg,
                                                'referencesimg_name_th'    => $request->input('name_tha')[$key],
                                                'updated_at'               => new DateTime
                                    
                                               
                                             );
                                               DB::table('referencesimg')->insert($val);
                                               
                                           }
                        
                                           
                                       }
                                Session::flash('alert-update','update');
                                // return redirect('backoffice/references');
                                return back(); 
                                   
                               }

                                public function delete_referencesimg($id){
                                DB::table('referencesimg')->where('referencesimg_id',$id)->delete();
                                
                                return Response::json();
                        }

                                public function ajax_referencessort($id,$sort){
                                    $data['references_sort'] = $sort;
                            
                                    DB::table('references')->where('references_id',$id)->update($data);
                                    
                                    return Response::json();
                                }
        
                

//references/type

                public function type(){
                    
                    $data = DB::table('type')->get();  
                    return view('type/index',['data'=>$data]); 
                }


                public function ajax_createtype(Request $request){
                    $bannerimg = '';
                    if($request->hasFile('bannerimg')){
                             $files 			= $request->file('bannerimg');
                             $filename 		    = $files->getClientOriginalName();
                             $extension 		= $files->getClientOriginalExtension();
                             $size			    = $files->getSize();
                             $bannerimg 		= date('YmdHis').rand().'.'.$extension;
                             $destinationPath   = base_path()."/assets/images/type/";
                             $files->move($destinationPath, $bannerimg);
        
                    }
        
                  
                           
                            $val=array(
        
                                
                                'type_name_en'              => $request->input('name_en'),
                                'type_name_th'              => $request->input('name_th'),
                                'type_img'                  =>$bannerimg,
                                'created_at'                => new DateTime,
                                'updated_at'                => new DateTime,
                            );
                            DB::table('type')->insert($val);

                            Session::flash('alert-insert','insert');
                            return back();                
                    }

                    public function del_type($id){

                        $img = DB::table('type')->where('type_id',$id)->select('type_img')->first();
                        if($img){
                        $destinationPath  = base_path()."/assets/images/type/".$img->type_img;
                        if(is_file($destinationPath)){              
                            unlink($destinationPath);
                        }
        
                        
                  
                    }
                        DB::table('type')->where('type_id',$id)->delete();
                        return redirect('backoffice/references/type');
             }


             public function type_update($id){
                $data=DB::table('type')->where('type_id',$id)->first();
                return view('type/update',['data'=>$data]);
    
            }

            public function type_updated(Request $request){
                $bannerimg = '';
                if($request->hasFile('bannerimg')){
                         $files 			= $request->file('bannerimg');
                         $filename 		    = $files->getClientOriginalName();
                         $extension 		= $files->getClientOriginalExtension();
                         $size			    = $files->getSize();
                         $bannerimg 		= date('YmdHis').rand().'.'.$extension;
                         $destinationPath   = base_path()."/assets/images/type/";
                         $files->move($destinationPath, $bannerimg);
     
                        $img = DB::table('type')->where('type_id',$request->input('id'))->select('type_img')->first();
                        if($img){
                        $destinationPath  = base_path()."/assets/images/type/".$img->type_img;
                        if(is_file($destinationPath)){              
                            unlink($destinationPath);
    
                        }

                    }
    
                }
                else{
                    $bannerimg  = $request->input('oldimg');
                }
            
                    
        
                $val=array(
    
    
                    'type_name_en'              => $request->input('name_en'),
                    'type_name_th'              => $request->input('name_th'),
                    'type_img'                  =>$bannerimg,
                    'updated_at'                => new DateTime,
    
        
        
                );
                DB::table('type')->where('type_id',$request->input('id'))->update($val);
    
                Session::flash('alert-update','update');
                return redirect('backoffice/references/type');
                
               
            }
        
                public function ajax_typesort($id,$sort){
                    $data['type_sort'] = $sort;
                    DB::table('type')->where('type_id',$id)->update($data);
                    
                    return Response::json();
            }
                            
            
        

              

               
           
}