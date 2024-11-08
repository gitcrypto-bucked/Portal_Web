<?php

namespace App\Http\Controllers;

use App\Http\Controllers\MailController;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class UserController extends Controller
{

    public function registerIndex()
    {
        return view('user.register');
    }


    public function registerNewUser(Request $request)
    {
        $request->validate(
        [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'cfm_email'=>'required|same:email',
            'empresa'=>'required',
            'permission'=>'required',
        ]);

        if($request->cfm_email != $request->email)
        {
            return redirect('/register-user')->with('error', 'O email  não coincidem com o email de confirmação.');
        }

        // insere o usuario na tabela users
        $created_at= date('Y-m-d H:i:s', time());

        DB::table('users')->insert(['name'=>$request->name,
            'email'=>$request->email,
            'password'=> md5(time()),
            'active'=>'1',
            'level' => $request->permission,
            'created_at'=>$created_at,
            'empresa' => strtolower($request->empresa),
            'centro_de_custo' => strtolower($request->ced)]);

        $token = md5(bin2hex(random_bytes(32))); // token de acesso para usuario cadastrar senha
        $created_at= date('Y-m-d H:i:s', time()); //data hora tabela password_reset_tokens
        DB::table('password_reset_tokens')->insert(['email'=>$request->email,'token'=>$token,'created_at'=>$created_at ]); //tabela do token de usuario
        $URL = route('password_register', $token); //gera o link de acesso
        if(MailController::sendNewUserMail($request->email, $URL,$request->name))
        {
            return redirect('/register-user')->with('success', 'Cadastro Realizado com Sucesso!');
        }
        else return redirect('/register-user')->with('error', 'Erro ao enviar email, por favor contate o suporte.');
    }


    public function tokenValid(Request $request)
    {
        if($request->token==null | $request->token=='')
        {
            return view('link.expired-link');  // o usuario ja alterou a senha ou o token expirou
        }
        $user = DB::table('users')
            ->select(['users.name', 'users.email', 'users.empresa'])
            ->join('password_reset_tokens', 'users.email', '=', 'password_reset_tokens.email')
            ->where('password_reset_tokens.token', '=',$request->token)
            ->get();
        if(isset($user[0]) && !empty($user[0]))
        {
            return view('register-password',['user'=>$user[0] ,'token',$request->token]);
        }
        if(!isset($user[0]) && empty($user[0]))
        {
            return view('link.expired-link');  // o usuario ja alterou a senha ou o token expirou
        }


    }


    public function updateUserPassword(Request $request)
    {

    }

}
