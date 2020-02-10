@extends('layouts.app')

@section('content')
<div class="row">

<div class="col-sm-6 offset-3">
    <h1 class="display-3">Tickets</h1>    
        <div class="col-sm-12">

            @if(session()->get('success'))
              <div class="alert alert-success">
                {{ session()->get('success') }}  
              </div>
            @endif
          </div>
        @foreach($tickets as $ticket)
        <div class="card" style="margin: 2rem">
            <div class="card-header">
            <p>{{$ticket->title}}</p>
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
                    <a href="{{ route('showCommentaries', $ticket->id) }}">{{$ticket->comments()->count() . ' Comments'}}</a>
        
                <br>
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
        {{ $tickets->links() }}

<div>
</div>
@endsection