@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('You are logged in!') }}
                    </div>
                </div>
            </div>
        </div>
        @if(Auth::user() && Auth::user()->role && Auth::user()->role->id === 1)
            @foreach($users as $user)
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">{{ __('User') }} {{$user->login}}</div>

                            <div class="card-body">
                                <img class="card-img-top" src="{{ asset('/storage/'. $user->image) }}" alt="Card image cap">
                                <a href="{{ route('editAdmin', ['id' => $user->id]) }}">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Edit User') }}
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @elseif(Auth::user() && Auth::user()->role && Auth::user()->role->id === 2)
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">{{ __('User') }} {{Auth::user()->login}}</div>

                        <div class="card-body">
                            <img class="card-img-top" src="{{ asset('/storage/'. Auth::user()->image) }}" alt="Card image cap">
                            <a href="{{ route('editAdmin', ['id' => Auth::user()->id]) }}">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Edit User') }}
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        @endif
    </div>
@endsection
