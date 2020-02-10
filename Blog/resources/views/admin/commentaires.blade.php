@extends('layouts.app')

@section('content')

<h1 class="display-3 text-center" style="padding-bottom: 3rem;">Admin</h1>    
<div class="container-fluid">
<div class="row">
<div class="col-sm-6 offset-3">
        <h2 class="text-center">Comments</h2>
          @if(isset($comments))
        @foreach($comments as $comment)
        <div class="card" style="margin: 2rem">
            <div class="card-header">
                {{$comment->title}}
            </div>
            <div class="card-body">
              <blockquote class="blockquote mb-0">
                <p>id : {{$comment->id}}</p>
                <p>content : {{$comment->commentaries}}</p>
                <p>create at : {{$comment->created_at}}</p>
                <p>update at: {{$comment->updated_at}} </p>
                <br>
                </blockquote>
                {{-- VERIFICATION: SI L'USER_ID CORRESPONT A L'ID DU USER --}}
                <form action="{{ route('Delete', $comment->id)}}" method="post">
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
{{ $comments->links() }}
@endsection