<?php

namespace App\Http\Controllers\Backend;

use App\Models\banner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('banner.index',[
            'banner' => banner::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('banner.create-banner');
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
            'name'=> 'required',
            'sort' => 'required|unique:banner,sort'
        ],[
            'name.required'=> 'Nhập tên banner',
            'sort.required'=> 'Nhập thứ tự',
            'sort.unique'=> 'Thứ tự đã tồn tại'
        ]);

        $image='';
        if($request->has('file')){
            $file = $request->file;
            $file->move(base_path('/uploads'),$file->getClientOriginalName());
            $image = $file->getClientOriginalName();
        };

        if([
            'name'=>$request->name,
            'images'=>$image,
            'content'=>$request->content,
            'status'=>$request->status,
            'sort'=>$request->sort,
            'link'=>$request->link
        ]){
            return redirect()->route('backend.banner')->with('success','Thêm thành công');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function show(banner $banner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function edit(banner $banner)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, banner $banner)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function destroy(banner $banner)
    {
        //
    }
}
