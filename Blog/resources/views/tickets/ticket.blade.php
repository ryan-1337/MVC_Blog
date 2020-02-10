@extends('layouts.app')

@section('content')
<div class="row">

<div class="col-sm-6 offset-3">
    <h1 class="display-3">Ticket</h1>    
        <div class="col-sm-12">

            @if(session()->get('success'))
              <div class="alert alert-success">
                {{ session()->get('success') }}  
              </div>
            @endif
          </div>
          @if(isset($tickets))
        @foreach($tickets as $ticket)
        <div class="card" style="margin: 2rem">
            <div class="card-header">
                {{$ticket->title}}
            </div>
            <div class="card-body">
              <blockquote class="blockquote mb-0">
                <p>{{$ticket->content}}</p>
                <br>
                <a href=""><small class="text-muted">{{$ticket->tags}}</small></a>
                <br>
                <br>
                <footer class="blockquote-footer">Created : <cite title="Source Title">{{$ticket->created_at}}@if($ticket->updated_at != $ticket->created_at)<p>Update at : {{$ticket->updated_at}}</p>@endif</p></cite></footer>
                </blockquote>
                {{-- VERIFICATION: SI L'USER_ID CORRESPONT A L'ID DU USER --}}
                @if ($ticket->user_id == Auth::user()->id)
                <a href="{{ route('Edit',$ticket->id)}}" class="btn btn-primary">Edit</a>
                <form action="{{ route('Delete', $ticket->id)}}" method="post">
                @csrf
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
                @endif
            </div>
          </div>
        @endforeach
        <h2>Commentaries</h2>
        <hr>
        @foreach($commentaries as $commentarie)
        <div class="card">
            <div class="card-header">
            <h5 class="card-title">{{ $commentarie->user->username }}</h5>
            </div>
            <div class="card-body">
              <p class="card-text">{{ $commentarie->commentaries }}</p>
            </div>
          </div>
          <br>
        @endforeach
        <div class="form-group">
          <h2>Post commentary</h2>
          <form method="POST" action="{{ route('Commentaries', $ticket->id)}}">
            @csrf
            <textarea class="form-control" name="commentaries" id="commentaries" cols="30" rows="5"></textarea>
            <input class="btn btn-primary" type="submit" value="Send">
          </form>
        </div>
        @endif
  </div>
</div>
@endsection