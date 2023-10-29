<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostStoreRequest;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       return view('posty.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posty.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    //public function store(Request $request)
    public function store(PostStoreRequest $request)
    {
        //dump($request);
        //dd($request);
        //$request->dump();
        /* $request->validate([
            'tytul' => 'required|min:3|max:100',
            'autor' => 'required|min:2',
            'email' => 'required|email:rfc,dns',
            'tresc' => 'required|min:5'
        ],
        [
            'required' => 'To pole jest wymagane',
            'min' => 'Minimalna liczba znaków to :min',
            'max' => 'Maksymalna liczba znaków to :max',
            'email' => 'Błędny email'
        ]); */
        return redirect()->route('posty.index')->with('message', "Post dodany poprawnie")->with('class', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
