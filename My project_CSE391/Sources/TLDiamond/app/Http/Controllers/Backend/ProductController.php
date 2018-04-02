<?php

namespace App\Http\Controllers\Backend;

use App\Models\Products;
use App\Models\statuspro;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() 
    {
        return view('products.index',[
            'products' => Products::paginate(10), 
            'cats' => Category::all()
        ]);
    }
    /**
     * Show the  form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create-pro',[ 
            'cats'=>Category::where('parent','<>','0')->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=> 'required|min:3|max:50|unique:products,name',
            'slug'=>'required', 
            'price'=>'required'
        ],
        [
            'name.required'=> 'Chưa nhập tên sản phẩm',
            'name.min'=> 'Tên sản phẩm từ 3 đến 50 kí tự',
            'name.max'=> 'Tên sản phẩm từ 3 đến 50 kí tự',
            'name.unique'=> 'Sản phẩm đã tồn tại',
            'slug.required' => 'Đường dẫn không được để trống',
            'price.required'=> 'Vui lòng nhập giá sản phẩm'
        ]);

        $image='';
        if($request->has('file')){
            $file = $request->file;
            $file->move(base_path('/uploads'),$file->getClientOriginalName());
            $image = $file->getClientOriginalName();
        };

        $image_hover1='';
        if($request->has('file1')){
            $file1 = $request->file1;
            $file1->move(base_path('/uploads'),$file1->getClientOriginalName());
             $image_hover1 = $file1->getClientOriginalName();
        };
        $image_hover2='';
        if($request->has('file2')){
            $file2 = $request->file2;
            $file2->move(base_path('/uploads'),$file2->getClientOriginalName());
            $image_hover2 = $file2->getClientOriginalName();
        };
        $image_hover3='';
        if($request->has('file3')){
            $file3 = $request->file3;
            $file3->move(base_path('/uploads'),$file3->getClientOriginalName());
            $image_hover3 = $file3->getClientOriginalName();
        };
        $image_hover4='';
        if($request->has('file4')){
            $file4 = $request->file4;
            $file4->move(base_path('/uploads'),$file4->getClientOriginalName());
            $image_hover4 = $file4->getClientOriginalName();
        };

        if(Products::create([
            'name'=> $request->name,
            'slug'=> $request->slug,
            'price'=> $request->price,
            'price_sale'=> $request->price_sale,
            'cat_id'=> $request->cat_id,
            'content'=> $request->content,
            'status'=> $request->status,
            'images'=> $image,
            'images_hover1' => $image_hover1,
            'images_hover2' => $image_hover2,
            'images_hover3' => $image_hover3,
            'images_hover4' => $image_hover4,
        ])){
           
        if(!empty($request->status_pro)){
            statuspro::create([
            'name_pro'=>$request->name,
            'id_status'=>$request->status_pro
        ]);
        }
        if($request->status_sale){
            statuspro::create([
            'name_pro'=>$request->name,
            'id_status'=>$request->status_sale
        ]);
        }
        
        return redirect()->route('backend.products')->with('success','Thêm sản phẩm thành công');
    }else{
        return redirect()->back()->with('success','Loi roi');
    }
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function show(Products $products)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $c = Category::where('parent','<>','0')->get();
        $model = Products::find($id);
        return view('products.edit',[
            'model' => $model,
            'cats' => $c
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        $model = Products::find($id);
        $this->validate($request,[
            'name'=> 'required',
            'slug'=>'required',
            'cat_id'=> 'required', 
            'price'=> 'required'
        ]);

        $image=$model->images;
        if($request->has('file')){
            $file = $request->file;
            $file->move(base_path('/uploads'),$file->getClientOriginalName());
            $image = $file->getClientOriginalName();
        };

        $image_hover1=$model->images_hover1;
        if($request->has('file1')){
            $file1 = $request->file1;
            $file1->move(base_path('/uploads'),$file1->getClientOriginalName());
             $image_hover1 = $file1->getClientOriginalName();
        };
        $image_hover2=$model->images_hover2;
        if($request->has('file2')){
            $file2 = $request->file2;
            $file2->move(base_path('/uploads'),$file2->getClientOriginalName());
            $image_hover2 = $file2->getClientOriginalName();
        };
        $image_hover3=$model->images_hover3;
        if($request->has('file3')){
            $file3 = $request->file3;
            $file3->move(base_path('/uploads'),$file3->getClientOriginalName());
            $image_hover3 = $file3->getClientOriginalName();
        };
        $image_hover4=$model->images_hover4;
        if($request->has('file4')){
            $file4 = $request->file4;
            $file4->move(base_path('/uploads'),$file4->getClientOriginalName());
            $image_hover4 = $file4->getClientOriginalName();
        };

        $status = statuspro::where('name_pro',$model->name)->delete();

        $model->update([
            'name'=> $request->name,
            'slug'=> $request->slug,
            'price'=> $request->price,
            'price_sale'=> $request->price_sale,
            'cat_id'=> $request->cat_id,
            'content'=> $request->content,
            'status'=> $request->status,
            'images'=> $image,
            'images_hover1' => $image_hover1,
            'images_hover2' => $image_hover2,
            'images_hover3' => $image_hover3,
            'images_hover4' => $image_hover4
        ]);
        if(!empty($request->status_pro)){
            statuspro::create([
            'name_pro'=>$request->name,
            'id_status'=>$request->status_pro
        ]);
        }    

        if($request->status_sale){
            statuspro::create([
            'name_pro'=>$request->name,
            'id_status'=>$request->status_sale
        ]);
        }
        return redirect()->route('backend.products')->with('success','thanh cong');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        Products::destroy($id);
        return redirect()->route('backend.products')->with('success','thanh cong');
    }
}
