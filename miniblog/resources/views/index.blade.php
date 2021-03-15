@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                @if (Route::has('createPost'))
                    <div class="row justify-content-center">
                        <div class="col-md-4">
                            <a class="nav-link" href="{{ route('createPost') }}">
                                <button type="button" class="btn btn-primary">{{ __('Create Post') }}</button>
                            </a>
                        </div>
                    </div>
                @endif
                @foreach ($posts as $post)

                    <div class="row justify-content-center">

                        <div class="card" style="width: 18rem;">
                            <div class="card-body">
                                <h5 class="card-title">{{$post->name}}</h5>
                                <p class="card-text">{{$post->text}}</p>
                                <a href="{{ route('showPost', ['id' => $post->id]) }}" class="btn btn-primary">
                                    Show post
                                </a>
                                @if(Auth::user() && Auth::user()->role->id === 1)
                                    <a href="{{ route('editPost', ['id' => $post->id]) }}" class="btn btn-primary">
                                        Edit post
                                    </a>
                                    <form id="logout-form" action="{{ route('destroyPost', ['id' => $post->id]) }}"
                                          method="POST" class="">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-primary">Delete post</button>

                                    </form>
                                @elseif(Auth::user() && Auth::user()->role->id === 2 && Auth::user()->id === $post->user->id)
                                    <a href="{{ route('editPost', ['id' => $post->id]) }}" class="btn btn-primary">
                                        Edit post
                                    </a>
                                    <form id="logout-form" action="{{ route('destroyPost', ['id' => $post->id]) }}"
                                          method="POST" class="">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-primary">Delete post</button>

                                    </form>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="col-md-6">
                {{--                @if (Route::has('createPost'))--}}
                {{--                    <a class="nav-link" href="{{ route('createPost') }}">--}}
                {{--                        <button type="button" class="btn btn-primary">{{ __('Create Post') }}</button>--}}
                {{--                    </a>--}}
                {{--                @endif--}}
            </div>
        </div>
    </div>
@endsection
