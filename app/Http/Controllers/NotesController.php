<?php

namespace App\Http\Controllers;

use App\Note;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Auth;

class NotesController extends Controller {


    public function index() {
        $notes = Note::where('user_id', Auth::user()->getAuthIdentifier())->get();

        return view('notes.list')->with('notes', $notes);
    }

    public function create() {
        return view('notes.create');
    }

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

    public function show($id) {
        $note = Note::findOrFail($id);

        if($note->user_id != Auth::user()->getAuthIdentifier()) {
            abort(404);
        }

        return view('notes.show')->with('note', $note);
    }

    public function edit($id) {
        $note = Note::findOrFail($id);

        if($note->user_id != Auth::user()->getAuthIdentifier()) {
            abort(404);
        }

        return view('notes.edit')->with('note', $note);
    }

    public function update(Request $request, $id) {

        if($id != Auth::user()->getAuthIdentifier()) {
            abort(404);
        }

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

    public function destroy($id) {

        if($id != Auth::user()->getAuthIdentifier()) {
            abort(404);
        }
        Note::findOrFail($id)->delete();
        return redirect('/notes');
    }
}
