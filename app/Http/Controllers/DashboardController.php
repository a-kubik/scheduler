<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Note;
use App\Task;
use Auth;

class DashboardController extends Controller {

    public function index() {
        $notes = Note::where('user_id',Auth::user()->id)->limit(20)->get();
        $tasks = Task::where('user_id',Auth::user()->id)->limit(20)->orderBy('startDate')->get();
        return view('common.dashboard')->with('notes', $notes)->with('tasks', $tasks);
        
    }
}
