<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Auth;

class SettingsController extends Controller {

    public function index() {
        return view('settings.settings');
    }

    public function saveSettings(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'photo' => 'max:2048|image',
            'sidebar_color' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('settings')
                ->withErrors($validator)
                ->withInput();
        }

        if ($request->file('photo')) {

            $file = $request->file('photo');
            $ext = $file->guessClientExtension();
            $file->storeAs('public/avatars/' . auth()->id(), "avatar.{$ext}");
            Auth::user()->update(['photo' => 'storage/avatars/' . Auth::user()->id . '/avatar.jpeg']);
        }
        Auth::user()->update(['name' => $request->input('name'), 'sidebar_color' => $request->input('sidebar_color')]);

        return redirect('settings');
    }
}
