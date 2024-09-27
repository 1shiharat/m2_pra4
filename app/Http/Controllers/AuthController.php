<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
		// ログイン処理
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // 認証成功後、セッションを作成しホーム画面にリダイレクト
            return redirect()->intended('/home');
        }

        // 認証失敗時はログインページにリダイレクト
        return back()->withErrors([
            'email' => 'メールアドレスまたはパスワードが正しくありません。',
        ]);
    }

		// ログアウト処理
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/login');
    }
}
