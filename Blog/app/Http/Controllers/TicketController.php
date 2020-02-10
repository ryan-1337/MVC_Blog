<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use App\Ticket;
use Illuminate\Http\Request;
use Validator;

class TicketController extends Controller
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

    public function index()
    {
        $tickets = Ticket::orderBy('created_at', 'desc')->paginate(5);

        return view('tickets/index', compact('tickets'));
    }



    public function show()
    {
        return view('tickets/new');
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

    protected function create(Request $request)
    {
        Ticket::create([
            'title' => $request['title'],
            'content' => $request['content'],
            'user_id' => Auth::user()->id,
            'tags' => $request['tags'],
        ]);

        return redirect()->back()->with('message', 'Ticket Send !'); //redirection vers la page précedent avec un message gerer par la vue.
        
    }

}
