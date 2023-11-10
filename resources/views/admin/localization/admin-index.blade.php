@extends('admin.layouts.master')


@section('content')
    <div class="section">
        <div class="section-header">
            <h1>{{ __('Admin Localization') }}</h1>
        </div>
        <div class="card card-primary">
            <div class="card-header">
                <h4>{{ __('Localization for Admin Panel') }}</h4>
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
                    <div class="tab-pane fade show {{ $loop->index === 0 ? 'active' : '' }}" id="home-{{ $language->lang }}" role="tabpanel" aria-labelledby="home-tab2">
                        <div>
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <form method="POST" action="{{ route('admin.extract-localization-string') }}">
                                            @csrf
                                            <input type="hidden" name="directory"
                                                value="{{ resource_path('views/admin') }}">
                                            <input type="hidden" name="language_code" value="{{ $language->lang }}">
                                            <input type="hidden" name="file_name" value="admin">
                                            <button type="submit"
                                                class="btn btn-primary mx-3">{{ __('Generate Strings') }}</button>
                                        </form>

                                        <form class="translate-form" method="POST"
                                            action="">
                                            <input type="hidden" name="language_code" value="{{ $language->lang }}">
                                            <input type="hidden" name="file_name" value="admin">
                                            <button type="submit"
                                                class="btn btn-dark mx-3 translate-button">{{ __('Translate Strings') }}</button>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-{{ $language->lang }}">
                                    <thead>
                                        <tr>

                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
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
        @foreach ($languages as $language)
            $("#table-{{ $language->lang }}").dataTable({
                "columnDefs": [{
                    "sortable": false,
                    "targets": [2, 3]
                }]
            });
        @endforeach
    </script>
@endpush
