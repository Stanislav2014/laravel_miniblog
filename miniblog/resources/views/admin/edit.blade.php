@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Edit user') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('updateAdmin', ['id' => $user->id]) }}" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="form-group row">
                                <img class="card-img-top" src="..." alt="Card image cap">
                                <label for="name"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Phone') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                           class="form-control @error('Phone') is-invalid @enderror" name="name"
                                           value="{{ $user->phone }}" autocomplete="name" autofocus>

                                    @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                           class="form-control @error('email') is-invalid @enderror" name="name"
                                           value="{{ $user->email }}" autocomplete="name" autofocus>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="validatedCustomFile" name="image">
                                    <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                                    @error('image')
                                    <div class="invalid-feedback"> {{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Update User') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
