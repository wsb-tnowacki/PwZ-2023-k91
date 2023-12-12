<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostStoreRequest;
use App\Models\Posty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth ;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index','show']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$posty = Posty::all();
        $posty = Posty::with('user')->paginate(5);
        return view('posty.index', compact('posty'));
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
        $posty = new Posty();
        $posty->tytul = request('tytul');
        //$posty->autor = request('autor');
        $posty->email = request('email');
        $posty->tresc = request('tresc');
        $posty->user_id = Auth::user()->id;
        $posty->save();
        return redirect()->route('posty.index')->with('message', "Post dodany poprawnie")->with('class', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //echo "Show: $id";
        $post = Posty::with('user')->findOrFail($id);
        return view('posty.post',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //echo "Edit: $id";
        $post = Posty::findOrFail($id);
        return view('posty.edit',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    //public function update(Request $request, string $id)
    public function update(PostStoreRequest $request, string $id)
    {
        //echo "Update: $id";
        $post = Posty::findOrFail($id);
        $post->tytul = request('tytul');
        //$post->autor = request('autor');
        $post->email = request('email');
        $post->tresc = request('tresc');
        $post->update();
        return redirect()->route('posty.index')->with('message', "Post zmieniony poprawnie")->with('class', 'success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //echo "Destroy: $id";
        $post = Posty::findOrFail($id);
        $post->delete();
        return redirect()->route('posty.index')->with('message', "Post został usunięty")->with('class', 'danger');
    }
}
