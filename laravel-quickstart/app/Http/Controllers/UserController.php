<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use DB;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // wwith eager loading
        //select * from tasks wwhere id in (select task_id from task_user where...)
        //tạo ra 2 query cần rồi mới lấy tất cả mọi thứ
        // return view('users.index', [
        //     'users' => User::with('tasks')->get(),
        // ]);

        //lazy eager loading (nên dùng để lấy bổ sung dữ liệu quan hệ)
        // khác với cách trên ở chỗ trả về tất cả các user trước rồi mới lấy ra các task của từng user
        return view('users.index', [
            'users' => User::all()->load('tasks') // This will load tasks for each user,
        ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //return view('user.create'); // Ensure you have a 'user.create' view file.
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $user->username = $request->name;
        $user->save();

        // User::where('id', $user->id)->update([
        //     'username' => $request->name,
        //     // 'email' => $request->email,
        //     // 'password' => bcrypt($request->password),
        // ]);

        // DB::table("users")
        //     ->where("id", $user->id)
        //     ->update([
        //         "username" => $request->name,
        //         // "email" => $request->email,
        //         // "password" => bcrypt($request->password),
        //     ]);

        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
