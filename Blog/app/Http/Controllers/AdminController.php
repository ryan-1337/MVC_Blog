<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ticket;
use App\Commentaries;
use App\User;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function admin()
    {
        return view('admin');
    }

    public function index()
    {
        $tickets = Ticket::orderBy('created_at', 'desc')->limit(10)->get();

        $commentaries = Commentaries::orderBy('created_at','Desc')->limit(10)->get();

        $users = User::orderBy('created_at', 'desc')->limit(10)->get();

        return view('admin', compact('tickets', 'commentaries', 'users'));
    }

    public function users()
    {
        $users = User::orderBy('created_at', 'desc')->paginate(5);

        return view('admin/users', compact('users'));
    }

    public function tickets()
    {
        $tickets = Ticket::orderBy('created_at', 'desc')->paginate(5);

        return view('admin/tickets', compact('tickets'));
    }

    public function commentaires()
    {
        $comments = Commentaries::orderBy('created_at', 'desc')->paginate(5);

        return view('admin/commentaires', compact('comments'));
    }
}
