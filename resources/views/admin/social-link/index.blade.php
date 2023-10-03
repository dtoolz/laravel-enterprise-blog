@extends('admin.layouts.master')

@section('content')
    <div class="section">
        <div class="section-header">
            <h1>{{ __('Social Media Links') }}</h1>
        </div>
        <div class="card card-primary">
            <div class="card-header">
                <h4>{{ __('All Available Social Media Links') }}</h4>
                <div class="card-header-action">
                    <a href="{{ route('admin.social-link.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus"></i> {{ __('Create') }}
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="table-subscribers">
                        <thead>
                            <tr>
                                <th class="text-center">
                                    #
                                </th>
                                <th>{{ __('Email') }}</th>
                                <th>{{ __('Action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @foreach ($subscriber as $sub)
                            <tr>
                                <td>
                                    <a href="{{ route('admin.social-link.destroy', $sub->id) }}" class="btn btn-danger delete-item"><i class="fas fa-trash-alt"></i></a>
                                </td>
                            </tr>
                            @endforeach --}}
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
@endsection


@push('scripts')
    <script>
            $("#table-subscribers").dataTable({
                "columnDefs": [{
                    "sortable": false,
                    "targets": [1]
                }]
            });
    </script>
@endpush
