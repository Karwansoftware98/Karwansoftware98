<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
class ProductController extends Controller
{
    public function index(){
        $product = DB::table('products')->get();


        return view('product.index',compact('product'));
    }
    public function create(){
        return view('product.create');
    }

    public function store (Request $request){
        $data = array();
            $data['product_name']= $request->product_name;
            $data['product_code']= $request->product_code;
            $data['details']= $request->details;
            $image = $request->file('logo');
            if($image){
                $image_name =date('dmy_H-s_i');
                $ext = strtolower($image->getClientOriginalExtension());
                $image_full_name = $image_name.''.$ext;
                $upload_path = 'resources/media/';
                $image_url = $$upload_path.$image_full_name;
                $succes =$image->move($upload_path,$image_full_name);

                $data['logo'] =$image_url;
                $product = DB::table('products')->insert($data);
                return redirect()->route('product.index')->with('success','product succesfully created');

                $result = DB::table('users')
                ->select('*')
                ->whereBetween('id',[12,12,12,12])
                ->orderBy('film_id')
                ->limit('10')
                ->get();
            }

    }
    public function delete($id){
        dd($id);
    }
}
