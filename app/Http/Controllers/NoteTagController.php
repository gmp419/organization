<?php

namespace App\Http\Controllers;

use App\Models\NoteTag;
use Illuminate\Http\Request;

class NoteTagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tags = NoteTag::all();
        return view('note-tag.index', compact('tags'));
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
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'unique:note_tags|max:255|required',
        ]);

        NoteTag::create([
            'name' => $request->name,
        ]);

        return redirect()->route('noteTag.index')->with('success', 'Tag created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\NoteTag  $noteTag
     * @return \Illuminate\Http\Response
     */
    public function show(NoteTag $noteTag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\NoteTag  $noteTag
     * @return \Illuminate\Http\Response
     */
    public function edit(NoteTag $noteTag)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\NoteTag  $noteTag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, NoteTag $noteTag)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NoteTag  $noteTag
     * @return \Illuminate\Http\Response
     */
    public function delete(NoteTag $noteTag, $id)
    {
        //
        NoteTag::destroy($id);
        return redirect()->route('noteTag.index')->with('success', 'Tag deleted successfully');
    }
}
