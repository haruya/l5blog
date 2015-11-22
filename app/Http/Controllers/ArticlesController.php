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
	 * 記事の一覧
	 */
	public function getIndex()
	{
		$articles = $this->article->all();
		return view('articles.index')->with(compact('articles'));
	}

	/**
	 * 記事の詳細
	 */
	public function getShow($id)
	{
		$article = $this->article->find($id);
		return view('articles.show', compact('article'));
	}

	/**
	 * 記事の投稿(画面)
	 */
	public function getCreate()
	{
		return view('articles.create');
	}
	/**
	 * 記事の投稿
	 */
	public function postCreate(Request $request)
	{
		$data = $request->all();
		$this->article->fill($data);
		$this->article->save();

		return redirect()->to('articles/index');
	}

	/**
	 * 記事の編集(画面)
	 */
	public function getEdit($id)
	{
		$article = $this->article->find($id);
		return view('articles.edit')->withArticle($article);
	}

	/**
	 * 記事の編集
	 */
	public function postEdit(Request $request, $id)
	{
		$article = $this->article->find($id);
		$data = $request->all();
		$article->fill($data);
		$article->save();

		return redirect()->to('articles/index');
	}

	/**
	 * 記事の削除
	 */
	public function postDelete($id)
	{
		$article = $this->article->find($id);
		$article->delete();

		return redirect()->to('articles/index');
	}
}
