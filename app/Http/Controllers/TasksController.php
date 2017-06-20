<?php

namespace App\Http\Controllers;

use App\Task;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\DB;

class TasksController extends Controller {


        public function index() {

            $today = Carbon::now()->toDateString();

            $tasks = array();
            $startDates = DB::table('tasks')->where('startDate','>=',$today)->groupBy('startDate')->orderBy('startDate')->pluck('startDate')->take(3);

            foreach ($startDates as $index => $date) {
                $tasks[$index] = Task::where([['user_id', Auth::user()->getAuthIdentifier()],['startDate', $date]])->orderBy('time')->get();
            };
            //dd($tasks[0]);
            return view('tasks.list')->with('tasksCollection', $tasks);


        }

        public function create() {
            return view('tasks.create');
        }

        public function store(Request $request) {


            $validator = Validator::make($request->all(), [
                'title' => 'required|max:255',
                'startDate' => 'required'
            ]);
            if ($validator->fails()) {
                return redirect('tasks/create')
                    ->withErrors($validator)
                    ->withInput();
            }

            $task = $request->all();
            $task['user_id'] = Auth::user()->getAuthIdentifier();
            $task['category_id'] = 1;
            Task::create($task);

            return redirect('/tasks');
        }

        public function show($id) {
            $task = Task::findOrFail($id);
            if($task->user_id != Auth::user()->getAuthIdentifier()) {
                abort(404);
            }

            return view('tasks.show')->with('task', $task);
        }



        public function edit($id) {
            $task = Task::findOrFail($id);

            if($task->user_id != Auth::user()->getAuthIdentifier()) {
                abort(404);
            }

            return view('tasks.edit')->with('task', $task);
        }

    /*

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
