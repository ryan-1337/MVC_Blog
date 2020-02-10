<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use App\Ticket;
use App\Commentaries;
use Illuminate\Http\Request;
use Validator;

class CommentariesController extends Controller
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


    public function showCommentaries($id)
    {
        // $commentaries = Commentaries::All();
        $tickets = Ticket::where('id', $id)->get();
        if($tickets->isEmpty()) {
            return abort(404);
        } else {
        $commentaries = Commentaries::where('ticket_id', $id)->orderBy('id','Desc')->get();
        return view('tickets/ticket', compact('tickets','commentaries'));
        }
    }

    public function destroy($id)
    {
        $ticket = Ticket::find($id);
        $ticket->delete();

        return redirect()->back()->with('success', 'Ticket deleted !');
    }

    public function edit($id)
    {
        // findOrFail si lid n'es taps trouvé cette fonction renvoie une erreur 404
        $ticket = Ticket::findOrFail($id);
        
        return view('tickets/edit', compact('ticket'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'tags' => 'required',
        ]);

        $ticket = Ticket::findOrFail($id);
        $ticket->title = $request->get('title');
        $ticket->content = $request->get('content');
        $ticket->tags = $request->get('tags');
        $ticket->save();

        return redirect('ticket/index')->with('success', 'Ticket updated!');

    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'title' => 'required', 'string', 'min:5',
            'content' => 'required', 'string', 'max:255',
            'tags' => 'required', 'string', 'max:50'
        ]);
    }

    protected function create(Request $request, $id)
    {
        Commentaries::create([
            'user_id' => Auth::user()->id,
            'ticket_id' => $id,
            'commentaries' => $request['commentaries'],
        ]);

        return redirect()->back()->with('message', 'Ticket Send !'); //redirection vers la page précedent avec un message gerer par la vue.
        
    }

}

