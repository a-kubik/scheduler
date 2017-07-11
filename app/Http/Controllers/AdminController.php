<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;

class AdminController extends Controller {

    public function index() {
        $tasksCount = Task::all()->count();
        return view('admin.dashboard')->with('tasksCount', $tasksCount);
    }
}
