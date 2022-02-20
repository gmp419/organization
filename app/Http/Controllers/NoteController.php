<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\NoteTag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mockery\Matcher\Not;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $notes = Note::latest()->sortable()->paginate(10);
        return view('note.index', compact('notes'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $tags = NoteTag::all();

        return view('note.create', compact('tags'));
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
            'header' => 'bail|required|unique:notes|max:255',
            'body' => 'required',
        ]);

        if($request->file('note_image')){
            $file = $request->file('note_image');
            $file_name = time().'.'.$file->getClientOriginalExtension();

            $file->move(public_path('images'), $file_name);
            // $file->move(public_path('upload/notes_images/' . $file_name));
            $imageurl = env('BASE_URL') . 'images/'. $file_name;
        }

        Note::create([
            'header' => $request->header,
            'body' => $request->body,
            'tag_name' => $request->tag_name,
            'image' => $imageurl,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('note.index')->with('success', 'Note created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //        
        $notes = Note::find($id);
        return view('note.show', compact('notes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function edit(Note $note, $id)
    {
        //
        $notes = Note::find($id);
        return view('note.edit', compact('notes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Note $note)
    {
        //
        $request->validate([
            'header' => 'required',
            'body' => 'required',
            'images' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->file('images')) {
            $image = $request->file('images');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $imageurl = env('BASE_URL') . 'images/'. $imageName;
        }
        else{
            $imageurl = $request->image ?? '';
        }

        $notes = Note::find($request->id);
        $userID = $notes->user->id;

        $notes->update([
            'header' => $request->header,
            'body' => $request->body,
            'image' => $imageurl,
            'tag_name' => $request->tag_name,
            'user_id' => $userID,
            'updated_at' => now(),
        ]);

        return redirect()->route('note.show', $notes->id)->with('success', 'Note updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Note::find($id)->delete();
        return redirect()->route('note.index')->with('success', 'Note deleted successfully');
    }
}
