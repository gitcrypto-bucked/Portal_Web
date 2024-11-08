<?php

namespace App\Http\Controllers;
use App\Http\Controllers\MailController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function forgotPassword()
    {
        return view('auth.forgot-password');
    }
    public function userLogin(Request $request): \Illuminate\Http\RedirectResponse
    {
        $credentials = [
            'email' => $request->typeEmailX,
            'password' => $request->typePasswordX,
            'empresa' => strtolower($request->typeEmpresaX),
        ];
        if (Auth::attempt($credentials))
        {
            if(Auth::user()->active!=1)
            {
                return redirect('/login')->with('error', 'Usuário/Senha inválidos.');
            }
            return redirect()->intended('/news-list');
        }
        return redirect('/login')->with('error', 'Usuário/Senha inválidos.');
    }

    public function userLogout(Request $request): \Illuminate\Http\RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        $request->session()->flush();

        return redirect('/login');
    }

    public function recoverPassword(Request $request)
    {
        $credentials = [
            'email' => $request->typeEmailX,
            'empresa' => strtolower($request->typeEmpresaX),
        ];
        $user = DB::select('select * from users where email = ? and empresa=?', [$credentials['email'], $credentials['empresa']]);

        if (!empty($user))
        {
            if($user[0]->active==0 )
            {
                return redirect('/forgot-password')->with('error', 'Usuário inválido.');
            }
            else
            {
                $token = md5(bin2hex(random_bytes(32))); // token de acesso para usuario cadastrar senha
                $created_at= date('Y-m-d H:i:s', time()); //data hora tabela password_reset_tokens
                DB::table('password_reset_tokens')->insert(['email'=>$request->typeEmailX,'token'=>$token,'created_at'=>$created_at ]); //tabela do token de usuario
                $URL = route('password_register', $token); //gera o link de acesso
                if(MailController::sendPasswordRecoverMail($request->typeEmailX, $URL,$user[0]->name))
                {
                    return redirect('/forgot-password')->with('success', 'Você receberá em instantes um email!');
                }
                else return redirect('/forgot-password')->with('error', 'Erro ao enviar email, por favor contate o suporte.');
            }
        }
        return redirect('/login')->with('error', 'Usuário/Senha inválidos.');
    }
}
