<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;

class UsersController extends Controller
{
    public function index()
    {
        $query = User::query();
        //全件取得
        // $users = $query->get();
        // dd($users);
        
        //ページネーション
        $users = $query->orderBy('id','desc')->paginate(10);
        return view('users.index')->with('users',$users);
    }
    
        public function store(Request $request)
    {
        //userオブジェクト生成
        $user = User::create();

        //値の登録
        $user->name = $request->name;
        $user->email = $request->email;

        //保存
        $user->save();

        //一覧にリダイレクト
        return redirect()->to('/users');
    }
}
