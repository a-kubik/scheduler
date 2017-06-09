<?php

namespace App\Http\Controllers;

use App\Task;
use Auth;
use Illuminate\Http\Request;
use Validator;

class TasksController extends Controller {


        public function index() {
            $tasks = Task::where('user_id', Auth::user()->getAuthIdentifier())->get();
            return view('tasks.list')->with('tasks', $tasks);
        }

        public function create() {
            return view('tasks.create');
        }

        public function store(Request $request) {


            $validator = Validator::make($request->all(), [
                'title' => 'required|unique:tasks|max:255',
                'startDate' => 'required'
            ]);
            if ($validator->fails()) {
                return redirect('tasks/create')
                    ->withErrors($validator)
                    ->withInput();
            }

            $task = $request->all();
            $task['user_id'] = Auth::user()->getAuthIdentifier();
            $task['description'] = "Dupa";
            $task['time'] = "12:00";
            $task['duration'] = 1;
            $task['category_id'] = 1;
            Task::create($task);

            return redirect('/tasks');
        }

       /* public function show($id) {
            $note = Note::findOrFail($id);

            if($note->id != Auth::user()->getAuthIdentifier()) {
                abort(404);
            }

            return view('notes.show')->with('note', $note);
        }

        public function edit($id) {
            $note = Note::findOrFail($id);

            if($note->id != Auth::user()->getAuthIdentifier()) {
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
        }*/

}
