@extends('layouts.app')

@section('content')

<h1 class="display-3 text-center" style="padding-bottom: 3rem;">Admin</h1>    
<div class="container-fluid">
<div class="row">
<div class="col-sm-6 offset-3">
        <h2 class="text-center">Users</h2>
          @if(isset($users))
        @foreach($users as $user)
        <div class="card" style="margin: 2rem">
            <div class="card-header">
                {{$user->username}}
            </div>
            <div class="card-body">
              <blockquote class="blockquote mb-0">
                <p>id : {{$user->id}}</p>
                <p>name : {{$user->name}}</p>
                <p>lastname : {{$user->lastname}}</p>
                <p>type : {{$user->type}} </p>
                <p>number of tickets : </p>
                <p>number of comments </p>
                <br>
                <footer class="blockquote-footer">Created : <cite title="Source Title">{{$user->created_at}}</cite></footer>
                </blockquote>
                {{-- VERIFICATION: SI L'USER_ID CORRESPONT A L'ID DU USER --}}
                <form action="{{ route('Delete', $user->id)}}" method="post">
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
{{ $users->links() }}
@endsection