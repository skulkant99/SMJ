<?php

namespace App\Http\Controllers;

use DateTime;
use DB;
use File;
use Illuminate\Http\Request;
use Response;
use Session;

class ProductController extends Controller
{

    public function index()
    {
        $data = DB::table('product')->leftjoin('category', 'product.category_id', 'category.category_id')->get();
        return view('product/index', ['data' => $data]);
    }

    public function create()
    {
        $data2 = DB::table('category')->get();
        $categorysub = DB::table('categorysub')->get();
        $categorysub2 = DB::table('categorysub_2')->get();

        return view('product/create', ['data2' => $data2, 'categorysub' => $categorysub, 'categorysub2' => $categorysub2]);
    }

    public function create_product(Request $request)
    {
        //insert product coverimg

        $bannerimg = '';
        if ($request->hasFile('bannerimg')) {
            $files = $request->file('bannerimg');
            $filename = $files->getClientOriginalName();
            $extension = $files->getClientOriginalExtension();
            $size = $files->getSize();
            $bannerimg = date('YmdHis') . rand() . '.' . $extension;
            $destinationPath = base_path() . "/assets/images/product/";
            $files->move($destinationPath, $bannerimg);
        }

        $val = array(
            'product_code' => $request->input('code'),
            'product_code_th' => $request->input('code_th'),
            'category_id' => $request->input('type'),
            'categorysub_id' => $request->input('type1'),
            'categorysub_2_id' => $request->input('type2'),
            'product_name_th' => $request->input('name_th'),
            'product_name_en' => $request->input('name_en'),
            'product_detail_th' => $request->input('detail_th'),
            'product_detail_en' => $request->input('detail_en'),
            'product_table_th' => $request->input('detail_th1'),
            'product_table_en' => $request->input('detail_en1'),
            'product_img' => $bannerimg,
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
        );

        DB::table('product')->insert($val);

        $fileimg = "";
        if ($request->file('newsgallery')) {
            foreach ($request->file('newsgallery') as $key => $value) {
                $filename = $value->getClientOriginalName();
                $extension = $value->getClientOriginalExtension();
                $size = $value->getSize();
                $fileimg = date('YmdHis') . rand() . '.' . $extension;
                $destinationPath = base_path() . "/assets/images/productimg/";
                $value->move($destinationPath, $fileimg);

                $val = array(
                    'product_id' => $productid->product_id,
                    'productimg_img' => $fileimg,
                    'productimg_name_th' => $request->input('name_tha')[$key],
                    'created_at' => new DateTime,
                    'updated_at' => new DateTime,
                );
                DB::table('productimg')->insert($val);
            }
        }

        Session::flash('alert-insert', 'insert');
        return redirect('backoffice/product');
    }

    public function update($id)
    {
        $data = DB::table('product')->where('product_id', $id)->first();
        $productimg = DB::table('productimg')->where('product_id', $id)->get();
        $data2 = DB::table('category')->get();
        $categorysub = DB::table('categorysub')->get();
        $categorysub2 = DB::table('categorysub_2')->get();

        return view('product/update', ['data' => $data, 'productimg' => $productimg, 'data2' => $data2,
            'categorysub' => $categorysub, 'categorysub2' => $categorysub2]);

    }

    public function del($id)
    {
        $img = DB::table('product')->where('product_id', $id)->select('product_img')->first();
        if ($img) {
            $destinationPath = base_path() . "/assets/images/product/" . $img->product_img;
            if (is_file($destinationPath)) {
                unlink($destinationPath);
            }
            // DB::table('productimg')->where('productimg_id',$request->input('imgid'))->select('productimg_img')->delete();
        }
        DB::table('product')->where('product_id', $id)->delete();
        return redirect('backoffice/product');

    }

    public function update_update(Request $request)
    {
        $bannerimg = '';
        $productid = DB::table('product')->latest()->first();
        if ($request->hasFile('bannerimg')) {
            $files = $request->file('bannerimg');
            $filename = $files->getClientOriginalName();
            $extension = $files->getClientOriginalExtension();
            $size = $files->getSize();
            $bannerimg = date('YmdHis') . rand() . '.' . $extension;
            $destinationPath = base_path() . "/assets/images/product/";
            $files->move($destinationPath, $bannerimg);

            $img = DB::table('product')->where('product_id', $request->input('id'))->select('product_img')->first();
            if ($img) {
                $destinationPath = base_path() . "/assets/images/product/" . $img->product_img;
                if (is_file($destinationPath)) {
                    unlink($destinationPath);

                }
                // DB::table('productimg')->where('productimg_id',$request->input('imgid'))->select('productimg_img')->delete();
            }
        } else {
            $bannerimg = $request->input('oldimg');
        }

        $val = array(

            'product_code' => $request->input('code'),
            'product_code_th' => $request->input('code_th'),
            'category_id' => $request->input('type'),
            'categorysub_id' => $request->input('type1'),
            'categorysub_2_id' => $request->input('type2'),
            'product_name_th' => $request->input('name_th'),
            'product_name_en' => $request->input('name_en'),
            'product_detail_th' => $request->input('detail_th'),
            'product_detail_en' => $request->input('detail_en'),
            'product_table_th' => $request->input('detail_th1'),
            'product_table_en' => $request->input('detail_en1'),
            'product_img' => $bannerimg,
            'updated_at' => new DateTime,

        );
        DB::table('product')->where('product_id', $request->input('id'))->update($val);

        if ($request->input('list')) {
            foreach ($request->input('list') as $key) {
                $val = array(
                    'list_detail_th' => $key,
                    'product_id' => $request->input('id'),
                    'created_at' => new DateTime,
                    'updated_at' => new DateTime,
                );

                DB::table('list')->insert($val);

            }
        }

        $fileimg = "";
        if ($request->file('newsgallery')) {
            foreach ($request->file('newsgallery') as $key => $value) {
                $filename = $value->getClientOriginalName();
                $extension = $value->getClientOriginalExtension();
                $size = $value->getSize();
                $fileimg = date('YmdHis') . rand() . '.' . $extension;
                $destinationPath = base_path() . "/assets/images/productimg/";
                $value->move($destinationPath, $fileimg);

                $val = array(
                    'product_id' => $request->input('id'),
                    'productimg_img' => $fileimg,
                    'productimg_name_th' => $request->input('name_tha')[$key],
                    'created_at' => new DateTime,
                    'updated_at' => new DateTime,

                );
                DB::table('productimg')->insert($val);

            }

        }
        Session::flash('alert-update', 'update');
        return redirect('backoffice/product');

    }

    public function delete_productimg($id)
    {
        DB::table('productimg')->where('productimg_id', $id)->delete();

        return Response::json();
    }

    public function get_subcategory(Request $request)
    {
        $sub = DB::table('categorysub')->where('category_id', $request->category_id)->get();
        return Response::json($sub);
    }

    public function get_subcategory2(Request $request)
    {
        $sub2 = DB::table('categorysub_2')->where('category_id', $request->category_id)->get();
        return Response::json($sub2);
    }

    public function ajax_productsort($id, $sort)
    {
        $data['product_sort'] = $sort;

        DB::table('product')->where('product_id', $id)->update($data);

        return Response::json();
    }

}
