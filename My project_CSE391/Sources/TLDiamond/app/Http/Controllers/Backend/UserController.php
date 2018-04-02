<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($groups)
    {
        $users = User::where('groups',$groups)->get();
        return view('user.index',[
            'user'=> $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create-user');
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
            'username'=> 'required|min:3|max:30|unique:user,username',
            'password'=> 'required|min:3|max:30',
            'password_rp' => 'same:password',
            'email'=> 'required'

        ],
        [
            'username.required'=> 'Chưa nhập tài khoản',
            'username.min'=> 'Tài khoản từ 3 đến 30 kí tự',
            'username.max'=> 'Tài khoản từ 3 đến 30 kí tự',
            'username.unique'=> 'Tài khoản đã tồn tại',
            'password.required'=> 'Chưa nhập mật khẩu',
            'password.min'=> 'Mật khẩu từ 3 đến 30 kí tự',
            'password.max'=> 'Mật khẩu từ 3 đến 30 kí tự',
            'password_rp.same'=> 'Nhập lại mật khẩu không đúng',
            'email.required'=> 'Chưa nhập email'
        ]);
        $groups = 'admin';
        if(User::Create([
            'username'=>$request->username,
            'password'=>bcrypt($request->password),
            'email'=>$request->email,
            'groups'=>$groups,
            'status' =>$request->status

        ]))
            return redirect()->route('backend.user',['groups'=>'admin'])->with('success','Them thanh cong');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);
        return redirect()->route('backend.user',['groups'=>'admin']);
    }
}
