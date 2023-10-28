<div class="card border border-primary">
    <div class="card-body ">
        <form action="{{ route('admin.seo-setting.update') }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="">{{ __('Website Seo Title') }}</label>
                <input type="text" name="site_seo_title" class="form-control" value="{{ $settings['site_seo_title'] }}">
            </div>
            <div class="form-group">
                <label for="">{{ __('Website Seo Description') }}</label>
                <textarea name="site_seo_description" class="form-control" style="height: 300px" cols="30" rows="10">{{ $settings['site_seo_description'] }}</textarea>
            </div>
            <div class="form-group">
                <label for="">{{ __('Website Seo Keywords') }}</label>
                <input name="site_seo_keywords" type="text" class="form-control inputtags" value="{{ $settings['site_seo_keywords'] }}">
            </div>
            <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
        </form>
    </div>
</div>
