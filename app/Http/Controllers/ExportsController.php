<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Comment;
use Session;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Redirect;
use Maatwebsite\Excel\Facades\Excel;

class ExportsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
              $articles = Article::all();

    return view('articles.index')->with('articles', $articles);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function export($id, Request $request)
    {
// dd(Article::find($id)->select('id', 'title', 'content')->first());
        $article = Article::find($id);
       $data1 = array($article->title, $article->content);
       $comments = Article::find($id)->comments->toArray();
       Excel::create('article_'.$id, function($excel) use ($data1, $comments){
           $excel->sheet('article', function ($sheet) use ($data1) {
               $sheet->row(1, array('title', 'content'));
               $sheet->appendRow($data1);
           });            $excel->sheet('comment', function ($sheet) use ($comments) {
               $sheet->row(1, array('content', 'user'));
               foreach ($comments as $comment) {
                   $sheet->appendRow(array($comment['content'], $comment['user']));
               }
           });
       })->download('xlsx');
       Session::flash('notice', 'Article exported');
       return redirect()->route('articles.index');
   }
        // Session::flash('notice', 'Article exported');
        // return redirect()->route('articles.index');
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
