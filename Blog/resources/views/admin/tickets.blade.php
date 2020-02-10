@extends('layouts.app')

@section('content')

<h1 class="display-3 text-center" style="padding-bottom: 3rem;">Admin</h1>    
<div class="container-fluid">
<div class="row">
<div class="col-sm-6 offset-3">
        <h2 class="text-center">Tickets</h2>
          @if(isset($tickets))
        @foreach($tickets as $ticket)
        <div class="card" style="margin: 2rem">
            <div class="card-header">
                {{$ticket->title}}
            </div>
            <div class="card-body">
              <blockquote class="blockquote mb-0">
                <p>id : {{$ticket->id}}</p>
                <p>content : {{$ticket->content}}</p>
                <p>create at : {{$ticket->created_at}}</p>
                <p>update at: {{$ticket->updated_at}} </p>
                <br>
                </blockquote>
                {{-- VERIFICATION: SI L'USER_ID CORRESPONT A L'ID DU USER --}}
                <form action="{{ route('Delete', $ticket->id)}}" method="post">
                @csrf
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </div>
          </div>
        @endforeach
        @endif
</div>
</div>
</div>
{{ $tickets->links() }}
@endsection