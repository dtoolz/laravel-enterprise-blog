@extends('admin.layouts.master')


@section('content')
    <div class="section">
        <div class="section-header">
            <h1>{{ __('Frontend Localization') }}</h1>
        </div>
        <div class="card card-primary">
            <div class="card-header">
                <h4>{{ __('Localization for frontend') }}</h4>
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
                                                value="{{ resource_path('views/frontend') }}">
                                            <input type="hidden" name="language_code" value="{{ $language->lang }}">
                                            <input type="hidden" name="file_name" value="frontend">
                                            <button type="submit"
                                                class="btn btn-primary mx-3">{{ __('Generate Strings') }}</button>
                                        </form>

                                        <form class="translate-form" method="POST"
                                            action="">
                                            <input type="hidden" name="language_code" value="{{ $language->lang }}">
                                            <input type="hidden" name="file_name" value="frontend">
                                            <button  type="submit"
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
                                            <th class="text-center">
                                                #
                                            </th>
                                            <th class="text-center">
                                                {{ __('String') }}
                                            </th>
                                            <th class="text-center">
                                                {{ __('Translation') }}
                                            </th>
                                            <th class="text-center">
                                                {{ __('Action') }}
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                        $translatedValues = trans('frontend', [], $language->lang);
                                        @endphp

                                    @foreach ($translatedValues as $key => $value)
                                        <tr>
                                            <td>{{ ++$loop->index }}</td>
                                            <td>{{ $key }}</td>
                                            <td>{{ $value }}</td>
                                            <td>
                                                <button data-langcode="{{ $language->lang }}"
                                                    data-key="{{ $key }}"
                                                    data-value="{{ $value }}" data-filename="frontend"
                                                    type="button" class="btn btn-primary modal_btn"
                                                    data-toggle="modal" data-target="#exampleModal">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
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
