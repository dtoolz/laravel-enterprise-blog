@extends('admin.layouts.master')

@section('content')
    <div class="section">
        <div class="section-header">
            <h1>{{ __('admin.Social Media Links') }}</h1>
        </div>
        <div class="card card-primary">
            <div class="card-header">
                <h4>{{ __('admin.All Available Social Media Links') }}</h4>
                <div class="card-header-action">
                    <a href="{{ route('admin.social-link.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus"></i> {{ __('admin.Create') }}
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
                                <th>{{ __('admin.Icon') }}</th>
                                <th>{{ __('admin.Url') }}</th>
                                <th>{{ __('admin.Status') }}</th>
                                <th>{{ __('admin.Action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($socialLinks as $socialLink)
                            <tr>
                                <td>{{ ++$loop->index }}</td>
                                <td><i style="font-size:30px" class="{{ $socialLink->icon }}"></i></td>
                                <td>{{ $socialLink->url }}</td>
                                <td>
                                    @if($socialLink->status === 1)
                                        <span class="badge badge-success">{{ __('admin.Yes') }}</span>
                                    @else
                                        <span class="badge badge-warning">{{ __('admin.No') }}</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('admin.social-link.edit', $socialLink->id) }}" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                    <a href="{{ route('admin.social-link.destroy', $socialLink->id) }}" class="btn btn-danger delete-item"><i class="fas fa-trash-alt"></i></a>
                                </td>
                            </tr>
                            @endforeach
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
