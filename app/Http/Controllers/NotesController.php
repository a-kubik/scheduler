<?php

namespace App\Http\Controllers;

use App\Note;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Auth;

class NotesController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $notes = Note::where('user_id', Auth::user()->getAuthIdentifier())->get();

        return view('notes.list')->with('notes', $notes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('notes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'title' => 'required|unique:notes|max:255',
            'content' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('notes/create')
                ->withErrors($validator)
                ->withInput();
        }

        $note = $request->all();
        $note['user_id'] = Auth::user()->getAuthIdentifier();
        Note::create($note);

        return redirect('/notes');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $note = Note::findOrFail($id);
        return view('notes.edit')->with('note', $note);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {

        $validator = Validator::make($request->all(), [
            'title' => 'required|unique:notes|max:255',
            'content' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('notes/'.$id.'/edit')
                ->withErrors($validator)
                ->withInput();
        }
        Note::findOrFail($id)->update($request->all());
        return redirect('/notes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }
}
