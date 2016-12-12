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
        $users = $query->get();
        // dd($users);
        
        //ページネーション
        $users = $query->orderBy('id','desc')->paginate(10);
        return view('users.index')->with('users',$users);
    }
    
        public function create()
    {
        //createに転送
        return view('users.create');
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
    
        public function edit($id)
    {
        //レコードを検索
        $user = User::find($id);
        //検索結果をビューに渡す
        return view('users.edit')->with('user',$user);
    }
    
        public function update(Request $request, $id)
    {
        //レコードを検索
        $user = User::find($id);
        //値を代入
        $user->name = $request->name;
        $user->email = $request->email;
        //保存（更新）
        $user->save();
        //リダイレクト
        return redirect()->to('/users');
    }
    
        public function show($id)
    {
        //レコードを検索
        $user = User::find($id);
        //検索結果をビューに渡す
        return view('users.show')->with('user',$user);
    }
    
        public function destroy($id)
    {
        //削除対象レコードを検索
        $user = User::find($id);
        //削除
        $user->delete();
        //リダイレクト
        return redirect()->to('/users');
    }
}
