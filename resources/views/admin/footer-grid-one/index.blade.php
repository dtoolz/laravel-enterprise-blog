@extends('admin.layouts.master')


@section('content')
    <div class="section">
        <div class="section-header">
            <h1>{{ __('Footer') }}</h1>
        </div>
        <div class="card card-primary">
            <div class="card-header">
                <h4>{{ __('All Footer Grid One Links') }}</h4>
                <div class="card-header-action">
                    <a href="{{ route('admin.footer-grid-one.create') }}" class="btn btn-primary">
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
                        $footer = \App\Models\FooterGridOne::where('language', $language->lang)->get();
                    @endphp
                    <div class="tab-pane fade show {{ $loop->index === 0 ? 'active' : '' }}" id="home-{{ $language->lang }}" role="tabpanel" aria-labelledby="home-tab2">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-{{ $language->lang }}">
                                    <thead>
                                        <tr>
                                            <th class="text-center">
                                                #
                                            </th>
                                            <th>{{ __('Name') }}</th>
                                            <th>{{ __('Language Code') }}</th>
                                            <th>{{ __('Url') }}</th>
                                            <th>{{ __('Status') }}</th>
                                            <th>{{ __('Action') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($footer as $item)
                                        <tr>
                                            <td>{{$item->id }}</td>
                                            <td>{{$item->name }}</td>
                                            <td>{{$item->language }}</td>
                                            <td>{{$item->url }}</td>
                                            <td>
                                                @if ($item->status == 1)
                                                    <span class="badge badge-success">{{ __('Yes') }}</span>
                                                @else
                                                     <span class="badge badge-warning">{{ __('No') }}</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.footer-grid-one.edit', $item->id)}}" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                                <a href="{{ route('admin.footer-grid-one.destroy', $item->id) }}" class="btn btn-danger delete-item"><i class="fas fa-trash-alt"></i></a>
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
