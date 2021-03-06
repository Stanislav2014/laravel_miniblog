@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Show post') }}</div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="name"
                                   class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                {{$post->name}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleFormControlTextarea1"
                                   class="col-md-4 col-form-label text-md-right">Text</label>
                            <div class="col-md-6">
                                {{$post->text}}
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <a href="{{ route('listPosts') }}">
                                    <button class="btn btn-primary">
                                        {{ __('List posts') }}
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
