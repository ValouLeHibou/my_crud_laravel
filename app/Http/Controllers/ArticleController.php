<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shares = Article::all();

        return view('articles.index', compact('shares'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'content' => 'required|string',
            'autor' => 'required|string',
            'type' => 'required|string',
            'image_url' => 'required|string'
        ]);
        $share = new Article([
            'title' => $request->get('title'),
            'content'=> $request->get('content'),
            'autor'=> $request->get('autor'),
            'type'=> $request->get('type'),
            'image_url'=> $request->get('image_url')
        ]);
        $share->save();
        return redirect('/articles')->with('success', 'updated');
    }

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
        $share = Article::find($id);

        return view('articles.edit', compact('share'));
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
        $request->validate([
            'title' => 'required|string',
            'content' => 'required|string',
            'autor' => 'required|string',
            'type' => 'required|string',
            'image_url' => 'required|string'
        ]);

        $share = Article::find($id);
        $share->title = $request->get('title');
        $share->content = $request->get('content');
        $share->autor = $request->get('autor');
        $share->type = $request->get('type');
        $share->image_url = $request->get('image_url');
        $share->save();

        return redirect('/articles')->with('success', 'Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $share = Article::find($id);
        $share->delete();

        return redirect('/articles')->with('success', 'Deleted Successfully');
    }
}
