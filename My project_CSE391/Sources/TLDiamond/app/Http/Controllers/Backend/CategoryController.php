<?php
namespace app\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $prc = Category::all();
        $c = Category::paginate(10);
        return view('category.index',[
            'cats' => $c, 
            'parentcat'=> $prc
        ]); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create-cat', [
            'cats'=> Category::Where('parent',0)->get(),
            'parentcat'=> Category::all()
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
        $this->validate(
            $request,
            [
                'name' => 'required|min:3|max:50|unique:category,name',
                'parent' => 'required'
            ],
            [
                'name.required' => 'Bạn chưa nhập dữ liệu',
                'name.min'=>'Tên quá ngắn. Nhập lại',
                'name.max'=>'Tên quá dài. Nhập lại',
                'name.unique'=>'Danh mục đã tồn tại',
                'parent.required' => 'Chưa chọn danh mục cha'
            ]
        );
        if (Category::create([
            'name' => $request->name,
            'parent' => $request->parent,
            'status' => $request->status        
        ]))
        {
        return redirect()->route('backend.category')->with('success','Thêm mới thành công');
        }else{
            return redirect()->back()->with('erro','Thêm thất bại!');
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        Category::destroy($id);
        return redirect()->route('backend.category')->with('success','thanh cong');
    }
}
