@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ __('Social Count') }}</h1>
        </div>
        <div class="card card-primary">
            <div class="card-header">
                <h4>{{ __('Create Social Media Links') }}</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.social-count.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="">{{ __('Language') }}</label>
                        <select name="language" id="language-select" class="form-control select2">
                            <option value="">--{{ __('Select') }}--</option>
                            @foreach ($languages as $lang)
                                <option value="{{ $lang->lang }}">{{ $lang->name }}</option>
                            @endforeach
                        </select>
                        @error('language')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">{{ __('Icon') }}</label>
                        <br>
                        <button class="btn btn-primary" name="icon" role="iconpicker"></button>
                        @error('icon')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">{{ __('Url') }}</label>
                        <input name="url" type="text" class="form-control" id="name">
                        @error('url')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">{{ __('Fan Count') }}</label>
                        <input name="fan_count" type="text" class="form-control" id="name">
                        @error('fan_count')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">{{ __('Fan Type') }}</label>
                        <input name="fan_type" type="text" class="form-control" id="name"
                            placeholder="ex: likes, fans, followers">
                        @error('fan_type')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">{{ __('Button Text') }}</label>
                        <input name="button_text" type="text" class="form-control" id="name">
                        @error('button_text')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>{{ __('Pick Your Color') }}</label>
                        <div class="input-group colorpickerinput">
                            <input name="color" type="text" class="form-control">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <i class="fas fa-fill-drip"></i>
                                </div>
                            </div>
                            @error('color')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">{{ __('Status') }}</label>
                        <select name="status" id="" class="form-control">
                            <option value="1">{{ __('Active') }}</option>
                            <option value="0">{{ __('Inactive') }}</option>
                        </select>
                        @error('status')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">{{ __('Create') }}</button>
                </form>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        $(".colorpickerinput").colorpicker({
            format: 'hex',
            component: '.input-group-append',
        });
    </script>
@endpush
