@extends('admin.layouts.master')


@section('content')
    <div class="section">
        <div class="section-header">
            <h1>{{ __('Home Section Settings') }}</h1>
        </div>
        <div class="card card-primary">
            <div class="card-header">
                <h4>{{ __('Home Section Settings') }}</h4>
                <div class="card-header-action">
                    <a href="{{ route('admin.category.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus"></i> {{ __('Create') }}
                    </a>
                </div>
            </div>
            <div class="card-body">
                <ul class="nav nav-tabs" id="myTab2" role="tablist">
                    @foreach ($languages as $language)
                        <li class="nav-item">
                            <a class="nav-link {{ $loop->index === 0 ? 'active' : '' }}" id="home-tab2" data-toggle="tab" href="#home-{{ $language->lang }}" role="tab"
                                aria-controls="home" aria-selected="true">{{ $language->name }}</a>
                        </li>
                    @endforeach
                </ul>
                <div class="tab-content tab-bordered" id="myTab3Content">
                    @foreach ($languages as $language)
                    @php
                        $categories = \App\Models\Category::where('language', $language->lang)->orderByDesc('id')->get();
                    @endphp
                    <div class="tab-pane fade show {{ $loop->index === 0 ? 'active' : '' }}" id="home-{{ $language->lang }}" role="tabpanel" aria-labelledby="home-tab2">
                        <div class="card-body">

                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
@endsection

@push('scripts')
    <script>

    </script>
@endpush
