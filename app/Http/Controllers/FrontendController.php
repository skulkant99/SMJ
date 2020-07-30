<?php

namespace App\Http\Controllers;

use DateTime;
use DB;
use File;
use Illuminate\Http\Request;
use Mail;

class FrontendController extends Controller
{

    public function about()
    {

        return view('frontend.about');
    }

    public function activity_all()
    {
        $activities = DB::table('activities')->orderBy('activities_date', 'desc')->paginate(6);

        return view('frontend.activity_all', ['activities' => $activities]);
    }

    public function activity_detail($id)
    {
        $activities = DB::table('activities')->where('activities_id', '=', $id)->first();

        return view('frontend.activity_detail', ['activities' => $activities]);
    }

    public function activity()
    {
        $activities = DB::table('activities')->orderBy('created_at', 'desc')->whereBetween('activities_date', [date('yy-m-01'), date('yy-m-t')])->limit(6)->get();

        return view('frontend.activity', ['activities' => $activities]);
    }

    public function career()
    {
        $career = DB::table('career')->orderBy('created_at', 'desc')->paginate(10);

        return view('frontend.career', ['career' => $career]);
    }

    public function career_upload_resume(Request $request)
    {
        $resumeimg = '';
        if ($request->hasFile('resume_image')) {
            $files = $request->file('resume_image');
            $filename = $files->getClientOriginalName();
            $extension = $files->getClientOriginalExtension();
            $size = $files->getSize();
            $resumeimg = date('YmdHis') . rand() . '.' . $extension;
            $destinationPath = base_path() . "/assets/images/browsefiles/";
            $files->move($destinationPath, $resumeimg);
        }

        $val = array(
            'browsefiles_files' => $resumeimg,
            'career_id' => $request->input('career_id'),
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
        );
        DB::table('browsefiles')->insert($val);
        try {
            $data = DB::table('browsefiles')->latest()->first();
            $email = ['hr@smjip.com', 'Sirimon.a@smjip.com'];
            $name = 'Career Form ';
            foreach ($email as $mail) {
                Mail::send('frontend.career_mail', ['data' => $data], function ($m) use ($mail, $name) {
                    $m->from('contact.smj202021@gmail.com', 'Career Form');
                    $m->to($mail, $name)->subject('SMJ Website Career');
                });
            }
        } catch (\Throwable $th) {
            return redirect('career');
        }
        return redirect('career');
    }

    public function contact()
    {

        return view('frontend.contact');

    }

    public function contact_us(Request $reruest)
    {
        $val = array(

            'contactus_name' => $reruest->input('name'),
            'contactus_email' => $reruest->input('email'),
            'contactus_phone_number' => $reruest->input('phone_number'),
            'contactus_topic' => $reruest->input('topic'),
            'contactus_message' => $reruest->input('message'),
            'created_at' => new DateTime,
            'updated_at' => new DateTime,

        );

        DB::table('contactus')->insert($val);
        $data = DB::table('contactus')->latest()->first();
        $email = ['info@smjip.com', 'sales@smjip.com', 'sirimon.a@smjip.com'];
        $name = 'ContactUs';

        foreach ($email as $mail) {
            Mail::send('frontend.contactus_mail', ['data' => $data], function ($m) use ($mail, $name) {
                $m->from('contact.smj202021@gmail.com', 'ContactUs Form');

                $m->to($mail, $name)->subject('SMJ Website ContactUs');
            });
        }

        return redirect('contact');

    }

    public function inc_footer()
    {

        return view('frontend.inc_footer');
    }

    public function inc_header()
    {

        return view('frontend.inc_header');
    }

    public function inc_productmenu()
    {

        return view('frontend.inc_productmenu');
    }

    public function inc_topbutton()
    {

        return view('frontend.inc_topbutton');
    }

    public function inc_topmenu()
    {

        return view('frontend.inc_topmenu');
    }

    public function index()
    {

        $banner = DB::table('banner')->where('banner_status', '=', $banner_status = 1)->orderBy('banner_sort', 'asc')->get();
        $partner = DB::table('partner')->where('partner_status', '=', $partner_status = 1)->orderBy('partner_sort', 'asc')->get();
        $activities = DB::table('activities')->orderBy('created_at', 'desc')->whereBetween('activities_date', [date('yy-m-01'), date('yy-m-t')])->limit(4)->get();
        $knowledge = DB::table('knowledge')->orderBy('created_at', 'desc')->whereBetween('knowledge_date', [date('yy-m-01'), date('yy-m-t')])->limit(3)->get();

        return view('frontend.index', ['banner' => $banner, 'partner' => $partner, 'activities' => $activities,
            'knowledge' => $knowledge]);
    }

    public function knowledge_all()
    {
        $knowledge = DB::table('knowledge')->orderBy('knowledge_date', 'desc')->paginate(6);

        return view('frontend.knowledge_all', ['knowledge' => $knowledge]);
    }

    public function knowledge_detail($id)
    {
        $knowledge = DB::table('knowledge')->where('knowledge_id', '=', $id)->first();

        return view('frontend.knowledge_detail', ['knowledge' => $knowledge]);
    }

    public function knowledge()
    {
        $knowledge = DB::table('knowledge')->orderBy('knowledge_sort', 'asc')->whereBetween('knowledge_date', [date('yy-m-01'), date('yy-m-t')])->limit(2)->get();
        // $query = $knowledge->where(date("m",strtotime($knowledge->knowledge_date)),"==",date("m"));

        return view('frontend.knowledge', ['knowledge' => $knowledge]);
    }

    public function product_detail($id)
    {
        $product = DB::table('product')->where('product_id', '=', $id)->first();
        $productimg = DB::table('productimg')->where('product_id', '=', $id)->get();
        $list = DB::table('list')->where('product_id', '=', $id)->get();

        return view('frontend.product_detail', ['product' => $product, 'productimg' => $productimg, 'list' => $list]);
    }

    // public function product($id){
    //     $product=DB::table('product')->get();
    //     return view('frontend.product',['product'=>$product]);
    // }

    public function product_id($id, Request $request)
    {

        $product;
        $product_all = DB::table('product')->get();
        if ($request->query->has('search')) {
            $product = DB::table('product')->where('product_code', 'like', '%' . $request->query('search') . '%')->orWhere('product_code_th', 'like', '%' . $request->query('search') . '%')->orderBy('created_at', 'desc')->paginate(8);
        } else {
            $product = DB::table('product')->where('category_id', $id)->orderBy('created_at', 'desc')->paginate(8);
        }
        $productimg = DB::table('productimg')->where('product_id', '=', $id)->get();
        $category = DB::table('category')->get();
        $categorysub = DB::table('categorysub')->get();
        $category_super_sub = DB::table('categorysub_2')->get();
        $category_name = DB::table('category')->where('category_id', $id)->first();
        //echo $request->query('search');
        return view('frontend.product', ['product_all' => $product_all, 'product' => $product, 'productimg' => $productimg, 'category' => $category, 'category_name' => $category_name, 'categorysub' => $categorysub, 'category_super_sub' => $category_super_sub]);

    }

    public function product_sub_id($id, $sub_id, Request $request)
    {

        $product;
        $product_all = DB::table('product')->get();
        if ($request->query->has('search')) {
            $product = DB::table('product')->where('product_code', 'like', '%' . $request->query('search') . '%')->orWhere('product_code_th', 'like', '%' . $request->query('search') . '%')->orderBy('created_at', 'desc')->paginate(8);
        } else {
            $product = DB::table('product')->where('category_id', $id)->where('categorysub_id', $sub_id)->orderBy('created_at', 'desc')->paginate(8);
        }
        $productimg = DB::table('productimg')->where('product_id', '=', $id)->get();
        $category = DB::table('category')->get();
        $categorysub = DB::table('categorysub')->get();
        $category_super_sub = DB::table('categorysub_2')->get();
        $category_name = DB::table('category')->where('category_id', $id)->first();
        //echo $request->query('search');
        return view('frontend.product', ['product_all' => $product_all, 'product' => $product, 'productimg' => $productimg, 'category' => $category, 'category_name' => $category_name, 'categorysub' => $categorysub, 'category_super_sub' => $category_super_sub]);

    }

    public function product_super_sub_id($id, $sub_id, $super_sub_id, Request $request)
    {
        $product;
        $product_all = DB::table('product')->get();
        if ($request->query->has('search')) {
            $product = DB::table('product')->where('product_code', 'like', '%' . $request->query('search') . '%')->orWhere('product_code_th', 'like', '%' . $request->query('search') . '%')->orderBy('created_at', 'desc')->paginate(8);
        } else {
            $product = DB::table('product')->where('category_id', $id)->where('categorysub_id', $sub_id)->where('categorysub_2_id', $super_sub_id)->orderBy('created_at', 'desc')->paginate(8);
        }
        $productimg = DB::table('productimg')->where('product_id', '=', $id)->get();
        $category = DB::table('category')->get();
        $categorysub = DB::table('categorysub')->get();
        $category_super_sub = DB::table('categorysub_2')->get();
        $category_name = DB::table('category')->where('category_id', $id)->first();
        //echo $request->query('search');
        return view('frontend.product', ['product_all' => $product_all, 'product' => $product, 'productimg' => $productimg, 'category' => $category, 'category_name' => $category_name, 'categorysub' => $categorysub, 'category_super_sub' => $category_super_sub]);
    }

    public function product_ajax(Request $request)
    {
        $product;
        if ($request->ajax()) {
            $id = $request->input('id');
            $sub_id = $request->input('sub_id');
            $super_sub_id = $request->input('super_sub_id');
            $search = $request->input('search');
            $text_header = DB::table('category')->where('category_id', '=', $id)->get();
            if ($search) {
                $product = DB::table('product')->where('product_code', 'like', '%' . $search . '%')->orWhere('product_code_th', 'like', '%' . $search . '%')->orderBy('created_at', 'desc')->paginate(8);
                return response()->json(['product' => $product], 200);
            }

            if ($id && !$sub_id && !$super_sub_id) {
                $product = DB::table('product')->where('category_id', '=', $id)->paginate(8);
            } else if ($id && $sub_id && !$super_sub_id) {
                $product = DB::table('product')->where('category_id', '=', $id)->where('categorysub_id', '=', $sub_id)->paginate(8);
            } else if ($id && $sub_id && $super_sub_id) {
                $product = DB::table('product')->where('category_id', '=', $id)->where('categorysub_id', '=', $sub_id)->where('categorysub_2_id', '=', $super_sub_id)->paginate(8);
            }
            return response()->json(['product' => $product, 'category_data' => $text_header], 200);
        }
    }

    // public function references($id){
    //     $references=DB::table('references')->get();

    //     return view('frontend.references',['references'=>$references]);
    // }

    public function references_id($id)
    {
        $type = DB::table('type')->orderBy('type_sort', 'asc')->get();
        $referencesimg = DB::table('referencesimg')->where('references_id', '=', $id)->get();
        $references = DB::table('references')->where('references_type', $id)->orderBy('references_sort', 'asc')->get();
        $type2 = DB::table('type')->where('type_id', $id)->first();

        return view('frontend.references', ['type' => $type, 'references' => $references, 'type2' => $type2, 'referencesimg' => $referencesimg]);
    }

}
