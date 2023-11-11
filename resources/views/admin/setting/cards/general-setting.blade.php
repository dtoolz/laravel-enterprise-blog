<div class="card border border-primary">
    <div class="card-body ">
        <form action="{{ route('admin.general-setting.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="">{{ __('admin.Website Name') }}</label>
                <input type="text" name="site_name" class="form-control" value="{{ $settings['site_name'] }}">
            </div>
            @error('site_name')
                <p class="text-danger">{{ $message }}</p>
            @enderror
            <div class="form-group">
                <img src="{{ asset($settings['site_logo']) }}" alt="" width="150"><br>
                <label for="">{{ __('admin.Website Logo') }}</label>
                <input type="file" name="site_logo" class="form-control">
            </div>
            @error('site_logo')
                <p class="text-danger">{{ $message }}</p>
            @enderror
            <div class="form-group">
                <img src="{{ asset($settings['site_favicon']) }}" alt="" width="150"><br>
                <label for="">{{ __('admin.Website Favicon') }}</label>
                <input type="file" name="site_favicon" class="form-control">
            </div>
            @error('site_favicon')
                <p class="text-danger">{{ $message }}</p>
            @enderror
            <button type="submit" class="btn btn-primary">{{ __('admin.Save') }}</button>
        </form>
    </div>
</div>
