<?php

namespace App\Http\Controllers\API;
use Illuminate\Http\Request; 
use App\Http\Controllers\Controller; 
use App\Article;
use Illuminate\Support\Facades\Auth; 
 
class ArticleController extends Controller
{
    public function index()
    {
        $user = Auth::user();     
        info($user);   
        info($user->name);   
        $aux = Article::all();
        /*
        foreach ($aux as $value) {
            $value->title = 'Titulo';
        }
        unset($value); // rompe la referencia con el último elemento
        */
        return $aux;
    }
 
    public function show($id)
    {
        return Article::find($id);
    }

    public function store(Request $request)
    {
        return Article::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $article = Article::findOrFail($id);
        $article->update($request->all());

        return $article;
    }

    public function delete(Request $request, $id)
    {
        $article = Article::findOrFail($id);
        $article->delete();

        return $article;
    }
}