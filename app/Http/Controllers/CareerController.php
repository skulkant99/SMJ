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

class CareerController extends Controller
{            
    
                        public function index(){
                            $data = DB::table('career')->orderBy('created_at','desc')->get();
                            return view('career/index',['data'=>$data]); 
                        }

                        public function index2(){
                            $data = DB::table('browsefiles')->leftjoin('career','browsefiles.career_id','career.career_id')->get();
                            return view('career/index2',['data'=>$data]); 
                        }



                        public function create(){
                            $data2 = DB::table('career')->get();
                            return view('career/create',['data2'=>$data2]);
                        }

                        public function create_career(Request $request){
                           
                    
                                $val=array(
                                    'career_title_th'               => $request->input('title_th'),
                                    'career_title_en'               => $request->input('title_en'),
                                    'career_department_th'          => $request->input('department_th'),
                                    'career_department_en'          => $request->input('department_en'),
                                    'career_detail_th1'             => $request->input('detail_th1'),
                                    'career_detail_en1'             => $request->input('detail_en1'),
                                    'career_detail_th2'             => $request->input('detail_th2'),
                                    'career_detail_en2'             => $request->input('detail_en2'),
                                    'career_detail_th3'             => $request->input('detail_th3'),
                                    'career_detail_en3'             => $request->input('detail_en3'),
                                    'career_detail_th4'             => $request->input('detail_th4'),
                                    'career_detail_en4'             => $request->input('detail_en4'),
                                    'career_date'                  => $request->input('date'),
                                    'created_at'                   => new DateTime,
                                    'updated_at'                   => new DateTime,
                                );
                    
                                
                                DB::table('career')->insert($val);                         
                               
                    
                          
                                Session::flash('alert-insert','insert');
                                return redirect('backoffice/career');
                            }


                            
                            public function del_career($id){
                
                                
                                DB::table('career')->where('career_id',$id)->delete();
                                return redirect('backoffice/career');
                        }


                        public function updated($id){
                            $data=DB::table('career')->where('career_id',$id)->first();
                            return view('career/update',['data'=>$data]);
            
                        }

                        public function update_career(Request $request){
                            
                    
                            $val=array(
                                'career_title_th'              => $request->input('title_th'),
                                'career_title_en'              => $request->input('title_en'),
                                'career_department_th'         => $request->input('department_th'),
                                'career_department_en'         => $request->input('department_en'),
                                'career_date'                  => $request->input('date'),
                                'career_detail_th1'            => $request->input('detail_th1'),
                                'career_detail_en1'            => $request->input('detail_en1'),
                                'career_detail_th2'            => $request->input('detail_th2'),
                                'career_detail_en2'            => $request->input('detail_en2'),
                                'career_detail_th3'            => $request->input('detail_th3'),
                                'career_detail_en3'            => $request->input('detail_en3'),
                                'career_detail_th4'            => $request->input('detail_th4'),
                                'career_detail_en4'            => $request->input('detail_en4'),
                                'career_date'                  => $request->input('date'),
                                'updated_at'                   => new DateTime,
                            );
                
                            
                            DB::table('career')->where('career_id',$request->input('id'))->update($val);                        
                          
                            Session::flash('alert-update','update');
                            return redirect('backoffice/career');
                        
                                   
                            }

                            public function del_description($id){
                                DB::table('description')->where('description_id',$id)->delete();
                                return Response::json();
                            }

                            public function del_qualifications($id){
                                DB::table('qualifications')->where('qualifications_id',$id)->delete();
                                return Response::json();
                            }

                            public function del_responsibility($id){
                                DB::table('responsibility')->where('responsibility_id',$id)->delete();
                                return Response::json();
                            }

                            public function del_information($id){
                                DB::table('Information')->where('information_id',$id)->delete();
                                return Response::json();
                            }
     
}