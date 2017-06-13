<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller {

    public function index() {
        $news = Note::where('user_id', Auth::user()->getAuthIdentifier())->get();
        return view('notes.list')->with('notes', $notes);
    }

    public function create() {
        return view('admin.news.create');
    }

   /* public function store(Request $request) {
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

        if ($note->user_id != Auth::user()->getAuthIdentifier()) {
            abort(404);
        }

        return view('notes.show')->with('note', $note);
    }

    public function edit($id) {
        $note = Note::findOrFail($id);

        if ($note->user_id != Auth::user()->getAuthIdentifier()) {
            abort(404);
        }

        return view('notes.edit')->with('note', $note);
    }

    public function update(Request $request, $id) {

        if ($id != Auth::user()->getAuthIdentifier()) {
            abort(404);
        }

        $validator = Validator::make($request->all(), [
            'title' => 'required|unique:notes|max:255',
            'content' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('notes/' . $id . '/edit')
                ->withErrors($validator)
                ->withInput();
        }
        Note::findOrFail($id)->update($request->all());
        return redirect('/notes');
    }

    public function destroy($id) {
        $note = Note::findOrFail($id);
        if ($note->user_id != Auth::user()->getAuthIdentifier()) {
            abort(404);
        }
        $note->delete();

        return redirect('/notes');
    }
}*/

}
