@extends('layouts.app')

@section('content')

<h1 class="display-3 text-center" style="padding-bottom: 3rem;">Admin</h1>    
<div class="container-fluid">
<div class="row">
<div class="col-sm-4">
        <h2 class="text-center">Tickets</h2>
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
                <form action="{{ route('Delete', $ticket->id)}}" method="post">
                @csrf
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
                @endif
            </div>
          </div>
        @endforeach
</div>
<div class="col-sm-4">
        <h2 class="text-center">Commentaries</h2>
        @foreach($commentaries as $commentarie)
        <div class="card" style="margin: 2rem">
            <div class="card-header">
            <h5 class="card-title">{{ $commentarie->user->username }}</h5>
            </div>
            <div class="card-body">
              <p class="card-text">{{ $commentarie->commentaries }}</p>
            </div>
          </div>
          <br>
        @endforeach
</div>
<div class="col-sm-4">
        <h2 class="text-center">Users</h2>
        @foreach($users as $user)
        <div class="card" style="margin: 2rem">
            <div class="card-header">
            <h5 class="card-title">{{ $user->type }}</h5>
            </div>
            <div class="card-body">
                <p>id : {{$user->id}}</p>
                <p>name : {{$user->name}}</p>
                <p>lastname : {{$user->lastname}}</p>
                <p>type : {{$user->type}} </p>
                <p>number of tickets : </p>
                <p>number of comments </p>
            </div>
          </div>
          <br>
        @endforeach
        @endif
  </div>
</div>
@endsection