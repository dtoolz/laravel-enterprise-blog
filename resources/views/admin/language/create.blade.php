@extends('admin.layouts.master')

@section('content')
    <div class="section">
        <div class="section-header">
            <h1>Language</h1>
        </div>
        <div class="card card-primary">
            <div class="card-header">
                <h4>Create a Language</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.language.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="">Language</label>
                        <select name="lang" id="language-select" class="form-control select2">
                            <option value="">--Select--</option>
                              @foreach (config('language') as $key => $lang)
                                 <option value="{{ $key }}">{{ $lang['name'] }}</option>
                              @endforeach
                        </select>
                        @error('lang')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" class="form-control" name="name" id="name" readonly>
                        @error('name')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Slug</label>
                        <input type="text" class="form-control" name="slug" id="slug" readonly>
                        @error('slug')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Is it default?</label>
                        <select name="default" id="" class="form-control">
                            <option value="0">No</option>
                            <option value="1">Yes</option>
                        </select>
                        @error('default')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Status</label>
                        <select name="status" id="" class="form-control">
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                        @error('status')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function(){
           $('#language-select').on('change', function(){
               let value = $(this).val();
               let name = $(this).children(':selected').text();
                $('#slug').val(value);
                $('#name').val(name);
           });
        });
    </script>
@endpush
