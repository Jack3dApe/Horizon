<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    protected $rules=[
        'name'=>'required|min:3|max:50',
    ];

    protected $messages=[
        'name.min'=>'The name needs to be at least 3 characters',
        'required'=>'This field is required',
    ];


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$genres=Genre::all();
        //dd($genres);
        //return view('genres.index',compact($genres));
        return view('genres.index',['genres'=>Genre::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('genres.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $validated = $request->validate($this->rules,$this->messages);
        //dd($validated);
        try{
            $genre=new Genre($validated);
            $genre->save();
            //dd($genre);
            return redirect(route('genres.index'))->with('success',"Genre registered with success! [#{$genre->id}]");

        }catch (\Exception $e){
            return redirect()->back()->withErrors(['error'=>"Error while creating Genre!"])->withInput();
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Genre $genre)
    {
        return view('genres.show',compact('genre'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Genre $genre)
    {
        return view('genres.edit',compact('genre'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Genre $genre)
    {
        $validated = $request->validate($this->rules,$this->messages);
        try{
            $genre->update($validated);
            $genre->save();
            //session()->put(['success'=>5]);
            return redirect(route('genres.show',$genre))->with(['success','Genre Altered Successfully']);//session()->flash('')

        }catch (\Exception $e){
            return redirect()->back()->withErrors(['error'=>"Error altering data! MSG:{$e->getMessage()}"])->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Genre $genre)
    {
        $genre->delete();
        return redirect(route('genres.index'));

    }
}
