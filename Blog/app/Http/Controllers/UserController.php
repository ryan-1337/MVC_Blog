<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Redirect;
use Illuminate\Support\Facades\Auth;
use App\Ticket;
use Illuminate\Http\Request;
use Validator;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */


    public function delete_user()
    {
        Auth::User()->comments()->delete();
        Auth::User()->ticket()->delete();
        Auth::User()->delete();
        return redirect('/register');
    }
}
