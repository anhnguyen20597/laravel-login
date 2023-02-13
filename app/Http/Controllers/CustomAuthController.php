<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;


class CustomAuthController extends Controller
{
    //ログイン
    public function login(){
        return view("auth.login");
    }

    public function logout(){
        return redirect('login');;
    }
    //申し込む
    public function registration(){
        return view("auth.registration");
    }
    //データにユーザーを登録する
    public function registerUser(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:8|max:12'
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $res = $user->save();
        if($res){
            return back()->with('success','ユーザーを登録できました。');
        }else{
            return back()->with('fail','エラー');
        }
    }
    
    //登録されたユーザーでログイン
    public function loginUser(Request $request){
       // dd($request);
        $request->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);
        $user = User::where('email','=',$request->email)->first();
        if($user){
            if(Hash::check($request->password,$user->password)){
                $request->session()->put('loginId',$user->id);
                return redirect('usermanagement');
            }else{
               return back()->with('fail','パスワードが間違い');
            }
              
        }else{
            return back()->with('fail','アカウントがまだ登録されていません');
        }
    }
    
    //ユーザーのデータを表示
    public function show(){
       // $user = new User;
        $user = User::all();
        return view('auth.usermanagement',['user'=>$user]);
    }

    public function delete($id){
        $user = User::find($id)->delete();
        echo "削除しました。";
        echo '<a href = "/usermanagement">前ページに戻る</a>.';
    }
}

