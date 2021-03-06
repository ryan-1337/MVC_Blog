@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
                {{-- VERIFICATION: SI L'USER_ID CORRESPONT A L'ID DU USER --}}
                @if ($ticket->user_id == Auth::user()->id)
            <div class="card">
                <div class="card-header">{{ __('Editer billet') }}</div>

                <div class="card-body">

                    <form method="POST" action="{{ route('Update', $ticket->id)}}">
                        @csrf

                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control @error('tags') is-invalid @enderror" name="title" value="{{ $ticket->title }}" required autocomplete="title" autofocus>

                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="content" class="col-md-4 col-form-label text-md-right">{{ __('Content') }}</label>

                            <div class="col-md-6">
                                <textarea id="content" type="text" class="form-control @error('content') is-invalid @enderror" name="content"  required autocomplete="content">{{ $ticket->content }}</textarea>

                                @error('content')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        

                        <div class="form-group row">
                            <label for="tags" class="col-md-4 col-form-label text-md-right">{{ __('Tags') }}</label>

                            <div class="col-md-6">
                                <input id="tags" type="text" class="form-control @error('tags') is-invalid @enderror" name="tags" value="{{ $ticket->tags }}" required autocomplete="tags" autofocus>

                                @error('tags')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Editer') }}
                                </button>
                            </div>
                        </div>
                    </form>
                    @if(session()->has('message'))
                    <div class="alert alert-succes text-center">
                        {{ session()->get('message')  }}
                    </div>
                    @endif
                </div>
            </div>
            @else
            <div class="alert alert-danger" role="alert">
                Vous n'etes pas autorisé à acceder a cette page !
            </div> 
            @endif
        </div>
    </div>
</div>
@endsection
