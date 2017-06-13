<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class SettingsController extends Controller {

    public function index() {
        $user = User::find(Auth::user()->getAuthIdentifier());
        dd($user);
    }
}
