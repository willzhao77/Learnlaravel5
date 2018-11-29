<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Comment;
use App\Article;

class CommentController extends Controller
{
  public function index(){
    // return view('admin/comment');
    return view('admin/comment')->withComments(Comment::all())->withArticles(Article::all());
    // return view('admin/comment')->withComments(Article::with('hasManyComments')->get('2'));
  }

  public function edit($id){
    return view('admin/edit')->withComment(Comment::find($id));
  }

  public function update(request $request, $id){
      $this->validate($request, [
      'nickname' => 'required|max:255',
      'email' => 'required',
      'content' => 'required',
    ]);

      $comment = Comment::find($id);
      $comment->nickname = $request->get('nickname');
      $comment->email = $request->get('email');
      $comment->website = $request->get('website');
      $comment->content = $request->get('content');
      $comment->article_id = $request->get('article_id');
      if($comment->save()){
        return redirect('admin/comments');
      }else{
        return redirect()->back()->withInput()->withErrors('保存失败！');
      }
  }

  public function store(request $request){
    $this->validate($request, [
    'nickname' => 'required|max:255',
    'email' => 'required',
    'content' => 'required',
  ]);
    $comment = new Comment;
    $comment->nickname = $request->get('nickname');
    $comment->email = $request->get('email');
    $comment->website = $request->get('website');
    $comment->content = $request->get('content');
    $comment->article_id = $request->get('article_id');
    if($comment->save()){
      return redirect('admin/comments');
    }else{
      return redirect()->back()->withInput()->withErrors('保存失败！');
    }
  }

  public function destroy($id){
    Comment::find($id)->delete();
    return redirect()->back()->withInput()->withErrors('删除成功！');
  }


}
