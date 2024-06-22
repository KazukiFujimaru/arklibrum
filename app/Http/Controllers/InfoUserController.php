<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\View;

class InfoUserController extends Controller
{

    public function create()
    {
        $data = DB::table('users')->get();

        return view('laravel-examples/user-profile');
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'name' => ['required', 'max:50'],
            'email' => ['required', 'email', 'max:50', Rule::unique('users')->ignore(Auth::user()->id)],
            'phone' => ['max:50'],
            'location' => ['max:70'],
            'about_me' => ['max:150'],
        ]);
    
        // Check if the email is different from the current user's email
        if ($request->get('email') != Auth::user()->email) {
            // Validate the email separately to ensure it is unique if changed
            $attributes['email'] = $request->validate([
                'email' => ['required', 'email', 'max:50', Rule::unique('users')->ignore(Auth::user()->id)],
            ])['email'];
        }
    
        // Update the user with the validated attributes
        User::where('id', Auth::user()->id)
            ->update($attributes);
    
        return redirect('/user-profile')->with('success', 'Profile updated successfully');
    }
    
}
