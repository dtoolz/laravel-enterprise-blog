@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ __('admin.Role and Permission') }}</h1>
        </div>
        <div class="card card-primary">
            <div class="card-header">
                <h4>{{ __('admin.Update User Role') }}</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.role-users.update', $user->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="">{{ __('admin.User Name') }}</label>
                        <input name="name" type="text" class="form-control" value="{{ $user->name }}">
                        @error('name')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">{{ __('admin.Email') }}</label>
                        <input name="email" type="text" class="form-control" value="{{ $user->email }}">
                        @error('email')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">{{ __('admin.Password') }}</label>
                        <input name="password" type="password" class="form-control" >
                        @error('password')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">{{ __('admin.Confirm Password') }}</label>
                        <input name="password_confirmation" type="password" class="form-control">
                        @error('password_confirmation')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">{{ __('admin.Role') }}</label>
                        <select name="role" id="" class="select2 form-control">
                            <option value="">{{ __('admin.--Select--') }}</option>
                            @foreach ($roles as $role)
                                <option {{ $role->name === $user->getRoleNames()->first() ? 'selected' : '' }} value="{{ $role->name }}">{{ $role->name }}</option>
                            @endforeach
                        </select>
                        @error('role')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">{{ __('admin.Update') }}</button>
                </form>
            </div>
        </div>
    </section>
@endsection
