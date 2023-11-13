@extends('frontend.layouts.master')

@section('content')
    <!-- login -->
    <section class="wrap__section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card mx-auto my-5" style="max-width: 380px;">
                        <div class="card-body">
                            @if (session()->has('status'))
                                <div class="alert alert-success">{{ session('status') }}</div>
                            @endif
                            <h5 class="card-title mb-4">{{ __('frontend.Forgot Password') }}</h5>
                            <form method="POST" action="{{ route('password.email') }}">
                                @csrf
                                <div class="form-group">
                                    <input class="form-control" placeholder="{{ __('frontend.Email') }}" type="text" name="email">
                                    @error('email')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block"> {{ __('frontend.Send Password Reset Link') }} </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <p class="text-center mt-4 mb-0">{{ __('frontend.Remembered your password?') }} <a href="{{ route('login') }}">{{ __('frontend.Login') }}</a></p>
                </div>
            </div>
        </div>
    </section>
    <!-- end login -->
@endsection
