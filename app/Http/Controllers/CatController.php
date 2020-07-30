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

class CatController extends Controller
{   
    
    //CAT
    
                        public function index(){
                            $data = DB::table('category')->get();
                            return view('cat/index',['data'=>$data]); 
                        }

                        public function create(){
                            return view('cat/create');
                        }

                        
                        public function create_cat(Request $request){
                                $val=array(


                                    'category_name_en'              => $request->input('name_en'),
                                    'category_name_th'              => $request->input('name_th'),
                                    'created_at'                    => new DateTime,
                                    'updated_at'                    => new DateTime,
                                );


                                DB::table('category')->insert($val);

                                Session::flash('alert-insert','insert');
                                return redirect('backoffice/cat');
                            }
                                
                        public function del_cat($id){
            
                            $img = DB::table('category')->where('category_id',$id)->select('category_img')->first();
                            if($img){
                            $destinationPath  = base_path()."/assets/images/category/".$img->category_img;
                            if(is_file($destinationPath)){              
                                unlink($destinationPath);
                            }
                        // DB::table('productimg')->where('productimg_id',$request->input('imgid'))->select('productimg_img')->delete();
                    }
                            DB::table('category')->where('category_id',$id)->delete();
                            return redirect('backoffice/cat');
                
                       }
                        public function updated($id){
                            $data=DB::table('category')->where('category_id',$id)->first();
                            return view('cat/update',['data'=>$data]);
            
                        }

                        public function update_cat(Request $request){
                                
                            $val=array(
                
                               
                                'category_name_en'              => $request->input('name_en'),
                                'category_name_th'              => $request->input('name_th'),
                                'updated_at'                    => new DateTime,
            
                            );
                            DB::table('category')->where('category_id',$request->input('id'))->update($val);
                
                            Session::flash('alert-update','update');
                            return redirect('backoffice/cat');
                               
                           }


//CAT1

                    public function cat1(){
                        $data =  DB::table('categorysub')->leftjoin('category','categorysub.category_id','category.category_id')->get();
                        return view('cat1/index',['data'=>$data]); 
                    }

                    public function created(){
                        $data2 = DB::table('category')->get();
                        return view('cat1/create',['data2'=>$data2]);
                    }


                    public function create_cat1(Request $request){
                            $val=array(

                                'category_id'                      => $request->input('type'),
                                'categorysub_name_en'              => $request->input('name_en'),
                                'categorysub_name_th'              => $request->input('name_th'),
                                'created_at'                       => new DateTime,
                                'updated_at'                       => new DateTime,
                            );


                            DB::table('categorysub')->insert($val);

                            Session::flash('alert-insert','insert');
                            return redirect('backoffice/cat1');
                        }
                            
                    public function del_cat1($id){

                        DB::table('categorysub')->where('categorysub_id',$id)->delete();
                        return redirect('backoffice/cat1');

                    }
                    public function update($id){
                        $data=DB::table('categorysub')->where('categorysub_id',$id)->first();
                        $data2 = DB::table('category')->get();
                        return view('cat1/update',['data'=>$data,'data2'=>$data2]);

                    }

                    public function update_cat1(Request $request){
                            
                        $val=array(

                        
                            'category_id'                      => $request->input('type'),
                            'categorysub_name_en'              => $request->input('name_en'),
                            'categorysub_name_th'              => $request->input('name_th'),
                            'updated_at'                       => new DateTime,

                        );
                        DB::table('categorysub')->where('categorysub_id',$request->input('id'))->update($val);

                        Session::flash('alert-update','update');
                        return redirect('backoffice/cat1');
                        
                    }

//CAT2

                        public function cat2(){
                            $data =  DB::table('categorysub_2')->leftjoin('categorysub','categorysub_2.categorysub_id','categorysub.categorysub_id')->get();
                            $data2 = DB::table('categorysub')->get();
                            $data3 = DB::table('category')->get();
                            return view('cat2/index',['data'=>$data,'data2'=>$data2,'data3'=>$data3]); 
                        }

                        public function created_cat2(){
                            $data2 = DB::table('categorysub')->get();
                            $data3 = DB::table('category')->get();

                            return view('cat2/create',['data2'=>$data2,'data3'=>$data3]);
                        }


                        public function create_cat2(Request $request){
                                $val=array(

                                    'category_id'                      => $request->input('type'),
                                    'categorysub_id'                   => $request->input('subcategory'),
                                    'categorysub_2_name_th'            => $request->input('name_en'),
                                    'categorysub_2_name_en'            => $request->input('name_th'),
                                    'created_at'                       => new DateTime,
                                    'updated_at'                       => new DateTime,
                                );


                                DB::table('categorysub_2')->insert($val);

                                Session::flash('alert-insert','insert');
                                return redirect('backoffice/cat2');
                            }
                                
                        public function del_cat2($id){

                            DB::table('categorysub_2')->where('categorysub_2_id',$id)->delete();
                            return redirect('backoffice/cat2');

                        }
                        public function updated_cat2($id){
                            $data2 = DB::table('categorysub')->get();
                            $data3 = DB::table('category')->get();
                            $data=DB::table('categorysub_2')->where('categorysub_2_id',$id)->first();
                            return view('cat2/update',['data'=>$data,'data2'=>$data2,'data3'=>$data3]);

                        }

                        public function update_cat2(Request $request){
                                
                            $val=array(

                            
                                'category_id'                      => $request->input('type'),
                                'categorysub_id'                   => $request->input('subcategory'),
                                'categorysub_2_name_th'            => $request->input('name_en'),
                                'categorysub_2_name_en'            => $request->input('name_th'),
                                'updated_at'                       => new DateTime,

                            );
                            DB::table('categorysub_2')->where('categorysub_2_id',$request->input('id'))->update($val);

                            Session::flash('alert-update','update');
                            return redirect('backoffice/cat2');
                            
                        }

                                                        
                          
                        

        
           
}