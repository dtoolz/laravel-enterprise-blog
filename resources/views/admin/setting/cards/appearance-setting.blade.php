<div class="card border border-primary">
    <div class="card-body ">
        <form action="{{ route('admin.appearance-setting.update') }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label>{{ __('Pick a Color for the website') }}</label>
                <div class="input-group colorpickerinput">
                    <input name="site_color" type="text" class="form-control" value="{{ $settings['site_color'] }}">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <i class="fas fa-fill-drip"></i>
                        </div>
                    </div>
                    @error('site_color')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
        </form>
    </div>
</div>

@push('scripts')
    <script>
        $(".colorpickerinput").colorpicker({
            format: 'hex',
            component: '.input-group-append',
        });
    </script>
@endpush
