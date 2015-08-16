<?php namespace App\Http\Controllers;

use App\Article;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ArticlesController extends Controller {


    protected $article;

    public function __construct(Article $article)
    {
        $this->article = $article;
    }

	/**
	 * Display a listing of the resource.
	 * 一覧
	 * @return Response
	 */
	public function index()
	{
		//
        $articles = $this->article->all();
        return view('articles.index')->with(compact('articles'));
	}

	/**
	 * Show the form for creating a new resource.
	 * 新規作成
	 * @return Response
	 */
	public function create()
	{
		// 新規登録画面を表示
        return view('articles.create');
	}

	/**
	 * Store a newly created resource in storage.
	 * 新規登録
	 * @return Response
	 */
	public function store(Request $request)
	{
		// パラメータを取得して保存
        $data = $request->all();
        $this->article->fill($data);
        $this->article->save();

        // 一覧画面へ遷移
        return redirect()->to('/');
	}

	/**
	 * Display the specified resource.
	 * 詳細
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
        $article = $this->article->find($id);

        return view('articles.show', compact('article'));
	}

	/**
	 * Show the form for editing the specified resource.
	 * 編集
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
        $article = $this->article->find($id);

        return view('articles.edit')->withArticle($article);
	}

	/**
	 * Update the specified resource in storage.
	 * 更新
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request, $id)
	{
		//
        $article = $this->article->find($id);
        $data = $request->all();
        $article->fill($data);
        $article->save();

        return redirect()->to('/');
	}

	/**
	 * Remove the specified resource from storage.
	 * 削除
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
        $article = $this->article->find($id);
        $article->delete();

        return redirect()->to('/');
	}

}
