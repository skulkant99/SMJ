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

class bannerController extends Controller
{   
    
//banner Home
    
                    public function index(){
                        $data = DB::table('banner')->orderBy('banner_sort','asc')->get();
                        return view('banner/index',['data'=>$data]); 
                        
                    }

                    public function create(){
                        $data = DB::table('banner')->get();
                        return view('banner/create',['data'=>$data]);
                    }

                   
                    public function create_banner(Request $request){
                        //insert product coverimg
                    $bannerimg = '';
                    if($request->hasFile('bannerimg')){
                            $files 			= $request->file('bannerimg');
                            $filename 		    = $files->getClientOriginalName();
                            $extension 		= $files->getClientOriginalExtension();
                            $size			    = $files->getSize();
                            $bannerimg 		= date('YmdHis').rand().'.'.$extension;
                            $destinationPath   = base_path()."/assets/images/banner/";
                            $files->move($destinationPath, $bannerimg);
                            
                            
                    }
                        

                        
                            $val=array(


                                'banner_img'                        =>$bannerimg,
                                'created_at'                        => new DateTime,
                                'updated_at'                        => new DateTime,
                            );
                            DB::table('banner')->insert($val);
                            Session::flash('alert-insert','insert');
                            return redirect('backoffice/banner');
                        }

                      
                        public function del($id){

                            $img = DB::table('banner')->where('banner_id',$id)->select('banner_img')->first();
                            if($img){
                            $destinationPath  = base_path()."/assets/images/banner/".$img->banner_img;
                            if(is_file($destinationPath)){              
                                unlink($destinationPath);
                            }
                    
                        }
                            DB::table('banner')->where('banner_id',$id)->delete();
                            return redirect('backoffice/banner');
                    }


                        public function updated($id){
                            $data=DB::table('banner')->where('banner_id',$id)->first();
                            return view('banner/update',['data'=>$data]);

                        }


                        public function update_banner(Request $request){
                            $bannerimg = '';
                            if($request->hasFile('bannerimg')){
                                    $files 			= $request->file('bannerimg');
                                    $filename 		    = $files->getClientOriginalName();
                                    $extension 		= $files->getClientOriginalExtension();
                                    $size			    = $files->getSize();
                                    $bannerimg 		= date('YmdHis').rand().'.'.$extension;
                                    $destinationPath   = base_path()."/assets/images/banner/";
                                    $files->move($destinationPath, $bannerimg);
                
                
                                        
                                    $img = DB::table('banner')->where('banner_id',$request->input('id'))->select('banner_img')->first();
                                    if($img){
                                    $destinationPath  = base_path()."/assets/images/banner/".$img->banner_img;
                                    if(is_file($destinationPath)){              
                                        unlink($destinationPath);
                
                                    }
                                }
                
                            }else{
                                $bannerimg  = $request->input('oldimg');
                            }
                                
                            $val=array(
                
                
                
                                'banner_img'                        =>$bannerimg,
                                'updated_at'                        => new DateTime,

                            );
                            DB::table('banner')->where('banner_id',$request->input('id'))->update($val);
                
                            Session::flash('alert-update','update');
                            return redirect('backoffice/banner');
                            
                        }

                        public function ajax_setbanner($id){
                            $val = array(
                                'banner_status' => 1
                            );

                            DB::table('banner')->where('banner_id',$id)->update($val);
                            return Response::json();
                        }

                        public function ajax_unsetbanner($id){
                            $val = array(
                                'banner_status' => 0
                            );

                            DB::table('banner')->where('banner_id',$id)->update($val);
                            return Response::json();
                        }   
                        
                        public function ajax_changesort($id,$sort){
                            $data['banner_sort'] = $sort;
                    
                            DB::table('banner')->where('banner_id',$id)->update($data);
                            
                            return Response::json();
                        }




//PARTNER
            public function partner(){
                $data = DB::table('partner')->orderBy('created_at','desc')->get();
                return view('partner/index',['data'=>$data]); 
            }

            public function created(){
                return view('partner/create');
            }

            public function create_partner(Request $request){
                $bannerimg = '';
                if($request->hasFile('bannerimg')){
                        $files 			    = $request->file('bannerimg');
                        $filename 		    = $files->getClientOriginalName();
                        $extension 		    = $files->getClientOriginalExtension();
                        $size			    = $files->getSize();
                        $bannerimg 		    = date('YmdHis').rand().'.'.$extension;
                        $destinationPath    = base_path()."/assets/images/partner/";
                        $files->move($destinationPath, $bannerimg);
                        
                        }
        
                           $val = array(

                           'partner_link'             => $request->input('link'),
                           'partner_img'              => $bannerimg,
                           'created_at'               => new DateTime,
                           'updated_at'               => new DateTime
                         );
                           DB::table('partner')->insert($val);
                       
                   
               
                Session::flash('alert-insert','insert');
                return redirect('backoffice/partner');
            }
    
                public function del_partner($id){
    
                    $img = DB::table('partner')->where('partner_id',$id)->select('partner_img')->first();
                    if($img){
                    $destinationPath  = base_path()."/assets/images/partner/".$img->partner_img;
                    if(is_file($destinationPath)){              
                        unlink($destinationPath);
                    }
              
                }
                    DB::table('partner')->where('partner_id',$id)->delete();
                    return redirect('backoffice/partner');
            }


                public function update($id){
                    $data=DB::table('partner')->where('partner_id',$id)->first();
                    return view('partner/update',['data'=>$data]);

                }

                public function update_partner(Request $request){
                    $bannerimg = '';
                    if($request->hasFile('bannerimg')){
                             $files 			= $request->file('bannerimg');
                             $filename 		    = $files->getClientOriginalName();
                             $extension 		= $files->getClientOriginalExtension();
                             $size			    = $files->getSize();
                             $bannerimg 		= date('YmdHis').rand().'.'.$extension;
                             $destinationPath   = base_path()."/assets/images/partner/";
                             $files->move($destinationPath, $bannerimg);
        
        
                                
                            $img = DB::table('partner')->where('partner_id',$request->input('id'))->select('partner_img')->first();
                            if($img){
                            $destinationPath  = base_path()."/assets/images/partner/".$img->partner_img;
                            if(is_file($destinationPath)){              
                                unlink($destinationPath);
        
                            }
                        }
        
                    }else{
                        $bannerimg  = $request->input('oldimg');
                    }
                        
                    $val=array(
        
        
                        'partner_link'                       => $request->input('link'),
                        'partner_img'                        =>$bannerimg,
                        'updated_at'                         => new DateTime,
    
                    );
                    DB::table('partner')->where('partner_id',$request->input('id'))->update($val);
        
                    Session::flash('alert-update','update');
                    return redirect('backoffice/partner');
                       
                   }
    
                

                public function ajax_setpartner($id){
                    $val = array(
                        'partner_status' => 1
                    );

                    DB::table('partner')->where('partner_id',$id)->update($val);
                    return Response::json();
                }

                public function ajax_unsetpartner($id){
                    $val = array(
                        'partner_status' => 0
                    );

                    DB::table('partner')->where('partner_id',$id)->update($val);
                    return Response::json();
                }   
                
                public function ajax_partnersort($id,$sort){
                    $data['partner_sort'] = $sort;
            
                    DB::table('partner')->where('partner_id',$id)->update($data);
                    
                    return Response::json();
                }
        

//product_banner

            public function index1(){
                $data = DB::table('product_banner')->get();
                return view('banner/index1',['data'=>$data]); 
                
        }

            public function create1(){
                $data = DB::table('product')->get();
                return view('banner/create1',['data'=>$data]);
        }


            public function create_banner1(Request $request){
                //insert product coverimg
            $bannerimg = '';
            if($request->hasFile('bannerimg')){
                    $files 			    = $request->file('bannerimg');
                    $filename 		    = $files->getClientOriginalName();
                    $extension 		    = $files->getClientOriginalExtension();
                    $size			    = $files->getSize();
                    $bannerimg 		    = date('YmdHis').rand().'.'.$extension;
                    $destinationPath    = base_path()."/assets/images/product_banner/";
                    $files->move($destinationPath, $bannerimg);
                    
            }
                
                    $val=array(


                        'product_banner_img'                =>$bannerimg,
                        'created_at'                        => new DateTime,
                        'updated_at'                        => new DateTime,
                    );
                    DB::table('product_banner')->insert($val);
                    Session::flash('alert-insert','insert');
                    return redirect('backoffice/banner1');
        }

            public function del_product($id){
        
                $img = DB::table('product_banner')->where('product_banner_id',$id)->select('product_banner_img')->first();
                if($img){
                $destinationPath  = base_path()."/assets/images/product_banner/".$img->product_banner_img;
                if(is_file($destinationPath)){              
                    unlink($destinationPath);
                }
        
            }
                DB::table('product_banner')->where('product_banner_id',$id)->delete();
                return redirect('backoffice/banner1');
        }


//references_banner

                public function index2(){
                    $data = DB::table('references_banner')->get();
                    return view('banner/index2',['data'=>$data]); 
            }


                 public function create2(){
                        $data = DB::table('references')->get();
                        return view('banner/create2',['data'=>$data]);
            }

                public function create_banner2(Request $request){
                        //insert product coverimg
                    $bannerimg = '';
                    if($request->hasFile('bannerimg')){
                            $files 			    = $request->file('bannerimg');
                            $filename 		    = $files->getClientOriginalName();
                            $extension 		    = $files->getClientOriginalExtension();
                            $size			    = $files->getSize();
                            $bannerimg 		    = date('YmdHis').rand().'.'.$extension;
                            $destinationPath    = base_path()."/assets/images/references_banner/";
                            $files->move($destinationPath, $bannerimg);
                            
                    }
                        
                            $val=array(
        
        
                                'references_banner_img'             =>$bannerimg,
                                'created_at'                        => new DateTime,
                                'updated_at'                        => new DateTime,
                            );
                            DB::table('references_banner')->insert($val);
                            Session::flash('alert-insert','insert');
                            return redirect('backoffice/banner2');
                }

                public function del_references($id){
        
                    $img = DB::table('references_banner')->where('references_banner_id',$id)->select('references_banner_img')->first();
                    if($img){
                    $destinationPath  = base_path()."/assets/images/references_banner/".$img->references_banner_img;
                    if(is_file($destinationPath)){              
                        unlink($destinationPath);
                    }
            
                }
                    DB::table('references_banner')->where('references_banner_id',$id)->delete();
                    return redirect('backoffice/banner2');
            }

//knowledge_banner
                        
                    public function index3(){
                        $data = DB::table('knowledge_banner')->get();
                        return view('banner/index3',['data'=>$data]); 
                }

                    
                    public function create3(){
                        $data = DB::table('knowledge')->get();
                        return view('banner/create3',['data'=>$data]);
                }

                    public function create_banner3(Request $request){
                        //insert product coverimg
                    $bannerimg = '';
                    if($request->hasFile('bannerimg')){
                            $files 			    = $request->file('bannerimg');
                            $filename 		    = $files->getClientOriginalName();
                            $extension 		    = $files->getClientOriginalExtension();
                            $size			    = $files->getSize();
                            $bannerimg 		    = date('YmdHis').rand().'.'.$extension;
                            $destinationPath    = base_path()."/assets/images/knowledge_banner/";
                            $files->move($destinationPath, $bannerimg);
                            
                    }
                        
                            $val=array(
        
        
                                'knowledge_banner_img'             =>$bannerimg,
                                'created_at'                        => new DateTime,
                                'updated_at'                        => new DateTime,
                            );
                            DB::table('knowledge_banner')->insert($val);
                            Session::flash('alert-insert','insert');
                            return redirect('backoffice/banner3');
                }

                public function del_knowledge($id){
        
                    $img = DB::table('knowledge_banner')->where('knowledge_banner_id',$id)->select('knowledge_banner_img')->first();
                    if($img){
                    $destinationPath  = base_path()."/assets/images/knowledge_banner/".$img->knowledge_banner_img;
                    if(is_file($destinationPath)){              
                        unlink($destinationPath);
                    }
            
                }
                    DB::table('knowledge_banner')->where('knowledge_banner_id',$id)->delete();
                    return redirect('backoffice/banner3');
            }



 //activities_banner                       

                        public function index4(){
                            $data = DB::table('activities_banner')->get();
                            return view('banner/index4',['data'=>$data]); 
                    }

                        public function create4(){
                            $data = DB::table('activities')->get();
                            return view('banner/create4',['data'=>$data]);
                    }

                        public function create_banner4(Request $request){
                            //insert product coverimg
                        $bannerimg = '';
                        if($request->hasFile('bannerimg')){
                                $files 			    = $request->file('bannerimg');
                                $filename 		    = $files->getClientOriginalName();
                                $extension 		    = $files->getClientOriginalExtension();
                                $size			    = $files->getSize();
                                $bannerimg 		    = date('YmdHis').rand().'.'.$extension;
                                $destinationPath    = base_path()."/assets/images/activities_banner/";
                                $files->move($destinationPath, $bannerimg);
                                
                        }
                            
                                $val=array(
            
            
                                    'activities_banner_img'             =>$bannerimg,
                                    'created_at'                        => new DateTime,
                                    'updated_at'                        => new DateTime,
                                );
                                DB::table('activities_banner')->insert($val);
                                Session::flash('alert-insert','insert');
                                return redirect('backoffice/banner4');
                }

                public function del_activities($id){
        
                    $img = DB::table('activities_banner')->where('activities_banner_id',$id)->select('activities_banner_img')->first();
                    if($img){
                    $destinationPath  = base_path()."/assets/images/activities_banner/".$img->activities_banner_img;
                    if(is_file($destinationPath)){              
                        unlink($destinationPath);
                    }
            
                }
                    DB::table('activities_banner')->where('activities_banner_id',$id)->delete();
                    return redirect('backoffice/banner4');
            }



//career_banner
                        public function index5(){
                            $data = DB::table('career_banner')->get();
                            return view('banner/index5',['data'=>$data]); 
                    }

                        
                        public function create5(){
                            $data = DB::table('career')->get();
                            return view('banner/create5',['data'=>$data]);
                    }

                        public function create_banner5(Request $request){
                            //insert product coverimg
                        $bannerimg = '';
                        if($request->hasFile('bannerimg')){
                                $files 			    = $request->file('bannerimg');
                                $filename 		    = $files->getClientOriginalName();
                                $extension 		    = $files->getClientOriginalExtension();
                                $size			    = $files->getSize();
                                $bannerimg 		    = date('YmdHis').rand().'.'.$extension;
                                $destinationPath    = base_path()."/assets/images/career_banner/";
                                $files->move($destinationPath, $bannerimg);
                                
                        }
                            
                                $val=array(
            
            
                                    'career_banner_img'                 =>$bannerimg,
                                    'created_at'                        => new DateTime,
                                    'updated_at'                        => new DateTime,
                                );
                                DB::table('career_banner')->insert($val);
                                Session::flash('alert-insert','insert');
                                return redirect('backoffice/banner5');
                }

                
                        public function del_career($id){
                
                            $img = DB::table('career_banner')->where('career_banner_id',$id)->select('career_banner_img')->first();
                            if($img){
                            $destinationPath  = base_path()."/assets/images/career_banner/".$img->career_banner_img;
                            if(is_file($destinationPath)){              
                                unlink($destinationPath);
                            }
                    
                        }
                            DB::table('career_banner')->where('career_banner_id',$id)->delete();
                            return redirect('backoffice/banner5');
                    }

    






          


    
        

       
        
           
}