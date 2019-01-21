<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Film;

class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shares = Film::all();

        return view('films.index', compact('shares'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('films.create');
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
            'director' => 'required|string',
            'productor' => 'required|string',
            'genre' => 'required|string',
            'synopsis' => 'required|string',
            'image_url' => 'required|string'
        ]);
        $share = new Film([
            'title' => $request->get('title'),
            'director'=> $request->get('director'),
            'productor'=> $request->get('productor'),
            'genre'=> $request->get('genre'),
            'synopsis'=> $request->get('synopsis'),
            'image_url'=> $request->get('image_url')
        ]);
        $share->save();
        return redirect('/films')->with('success', 'updated');
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
        $share = Film::find($id);

        return view('films.edit', compact('share'));
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
            'director' => 'required|string',
            'productor' => 'required|string',
            'genre' => 'required|string',
            'synopsis' => 'required|string',
            'image_url' => 'required|string'
        ]);

        $share = Film::find($id);
        $share->title = $request->get('title');
        $share->director = $request->get('director');
        $share->productor = $request->get('productor');
        $share->genre = $request->get('genre');
        $share->synopsis = $request->get('synopsis');
        $share->image_url = $request->get('image_url');
        $share->save();

        return redirect('/films')->with('success', 'Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $share = Film::find($id);
        $share->delete();

        return redirect('/films')->with('success', 'Deleted Successfully');
    }
}
