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

class KnowledgeController extends Controller
{            
    
                        public function index(){
                            $data = DB::table('knowledge')->get();
                            return view('knowledge/index',['data'=>$data]); 
                        }

                        public function create(){
                            return view('knowledge/create');
                        }

                        
                        public function create_knowledge(Request $request){
                        $bannerimg = '';
                        if($request->hasFile('bannerimg')){
                                $files 			    = $request->file('bannerimg');
                                $filename 		    = $files->getClientOriginalName();
                                $extension 		    = $files->getClientOriginalExtension();
                                $size			    = $files->getSize();
                                $bannerimg 		    = date('YmdHis').rand().'.'.$extension;
                                $destinationPath    = base_path()."/assets/images/knowledge/";
                                $files->move($destinationPath, $bannerimg);
                                
                        }
                                $val=array(


                                    'knowledge_date'                   => $request->input('date'),
                                    'knowledge_topic_th'               => $request->input('topic_th'),
                                    'knowledge_topic_en'               => $request->input('topic_en'),
                                    'knowledge_detail_th'              => $request->input('detail_th'),
                                    'knowledge_detail_en'              => $request->input('detail_en'),
                                    'knowledge_img'                    => $bannerimg,
                                    'created_at'                       => new DateTime,
                                    'updated_at'                       => new DateTime,
                                );


                                DB::table('knowledge')->insert($val);

                                Session::flash('alert-insert','insert');
                                return redirect('backoffice/knowledge');
                            }
                                
                        public function del_knowledge($id){
            
                            $img = DB::table('knowledge')->where('knowledge_id',$id)->select('knowledge_img')->first();
                            if($img){
                            $destinationPath  = base_path()."/assets/images/knowledge/".$img->knowledge_img;
                            if(is_file($destinationPath)){              
                                unlink($destinationPath);
                            }
                        // DB::table('productimg')->where('productimg_id',$request->input('imgid'))->select('productimg_img')->delete();
                    }
                            DB::table('knowledge')->where('knowledge_id',$id)->delete();
                            return redirect('backoffice/knowledge');
                
                       }
                        public function updated($id){
                            $data=DB::table('knowledge')->where('knowledge_id',$id)->first();
                            return view('knowledge/update',['data'=>$data]);
            
                        }

                        public function update_knowledge(Request $request){
                            $bannerimg = '';
                            if($request->hasFile('bannerimg')){
                                     $files 			= $request->file('bannerimg');
                                     $filename 		    = $files->getClientOriginalName();
                                     $extension 		= $files->getClientOriginalExtension();
                                     $size			    = $files->getSize();
                                     $bannerimg 		= date('YmdHis').rand().'.'.$extension;
                                     $destinationPath   = base_path()."/assets/images/knowledge/";
                                     $files->move($destinationPath, $bannerimg);
                
                
                                        
                                    $img = DB::table('knowledge')->where('knowledge_id',$request->input('id'))->select('knowledge_img')->first();
                                    if($img){
                                    $destinationPath  = base_path()."/assets/images/knowledge/".$img->knowledge_img;
                                    if(is_file($destinationPath)){              
                                        unlink($destinationPath);
                
                                    }
                                }
                
                            }else{
                                $bannerimg  = $request->input('oldimg');
                            }
                                
                            $val=array(
                
                                'knowledge_date'                   => $request->input('date'),
                                'knowledge_topic_th'                => $request->input('topic_th'),
                                'knowledge_topic_en'               => $request->input('topic_en'),
                                'knowledge_detail_th'              => $request->input('detail_th'),
                                'knowledge_detail_en'              => $request->input('detail_en'),
                                'knowledge_img'                     => $bannerimg,
                                'updated_at'                       => new DateTime,
            
                            );
                            DB::table('knowledge')->where('knowledge_id',$request->input('id'))->update($val);
                
                            Session::flash('alert-update','update');
                            return redirect('backoffice/knowledge');
                               
                           }
            
                           public function ajax_knowledgesort($id,$sort){
                            $data['knowledge_sort'] = $sort;
                            DB::table('knowledge')->where('knowledge_id',$id)->update($data);
                            
                            return Response::json();
                        }
                
            
                        

        
           
}