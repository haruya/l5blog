@extends('layouts.master')

@section('content')
	<h2 class="page-header">記事一覧</h2>
	<div>
	  {!!link_to('articles/create', '投稿', ['class'=>'btn btn-primary'])!!}
	</div>
	<table class="table table-striped table-hover">
		<thead>
			<tr>
				<th>タイトル</th>
				<th>本文</th>
				<th>作成日時</th>
				<th>更新日時</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
		@foreach($articles as $article)
			<tr>
				<td>{{$article->title}}</td>
				<td>{{$article->body}}</td>
				<td>{{$article->created_at}}</td>
				<td>{{$article->updated_at}}</td>
				<td>
				  {!!link_to('articles/show/'.$article->id, '詳細', ['class'=>'btn btn-default btn-xs'])!!}
				  {!!link_to('articles/edit/'.$article->id, '編集', ['class'=>'btn btn-success btn-xs'])!!}
				  {!!Form::open(['action'=>['ArticlesController@postDelete',$article->id]])!!}
				  	<button type="submit" class="btn btn-danger btn-xs" onclick='return confirm("本当に削除してもよろしいですか？");'>削除</button>
				  {!!Form::close()!!}
				 </td>
			</tr>
		@endforeach
		</tbody>
	</table>
@stop