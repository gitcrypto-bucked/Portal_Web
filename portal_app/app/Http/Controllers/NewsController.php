<?php

namespace App\Http\Controllers;

use App\Models\NewsModel;
use App\Policies\PermissionPolicy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{
    public function index()
    {
        $perm = new PermissionPolicy('news-list');
        $news = $this->getAllNews();
        return view('news')->with('perm', $perm)->with('news', $news);
    }

    public function getAllNews()
    {
        $paginate = Config::get('pagination.NEWS');
        $model = new NewsModel();
        return $model->getAllNews(intval($paginate));
    }

    public function registerIndex()
    {
        return view('news.register-news');
    }

    public function addNews(Request $request)
    {

        $request->validate([
            'thumb' => 'required|mimes:jpg,png,webp|max:2048',
            'webrul' => 'required|url',
            'sinopse' => 'required|string|min:20',
            'title' => 'required|string|min:8',
        ]);

        if(parse_url($request->webrul, PHP_URL_SCHEME)==false |
            parse_url($request->webrul, PHP_URL_HOST)==false)
        {
            return redirect('/register-news')->with('error', 'A url informada não é valida.');
        }
        if ($request->file('thumb')->isValid())
        {
            $file = $request->file('thumb');
        }
        else
        {
            return redirect('/register-news')->with('error', 'O arquivo de imagem tem que ser jpg, png, jpeg ou webp.');
        }
        $hora = time();
        $news = [
            'created_at'=>date('Y-m-d H:i:s', $hora),
            'thumb'=>$file->hashName(),
            'intro' => $request->sinopse,
            'active' => '1',
            'title' => $request->title,
            'url' => $request->webrul,
        ];
        $newsModel = new NewsModel();
        if($newsModel->insert($news))
        {
            return redirect('/register-news')->with('success', 'Noticia cadastrada com sucesso!');
        }
        return redirect('/register-news')->with('error', 'Houve um erro ao cadastrar a noticia!.');

    }


    /** função que desativa a noticia  */
    public function disableNews(Request $request)
    {
        $model = new NewsModel();
        if($model->remove($request->id))
        {
            return redirect('/list-news')->with('success', 'Noticia desativada com sucesso!');
        }
        return redirect('/list-news')->with('error', 'Houve um erro ao desativar a noticia!.');
    }
}
