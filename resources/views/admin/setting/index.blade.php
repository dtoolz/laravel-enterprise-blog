@extends('admin.layouts.master')


@section('content')
    <div class="section">
        <div class="section-header">
            <h1>{{ __('General Settings') }}</h1>
        </div>
        <div class="card card-primary">
            <div class="card-header">
                <h4>{{ __('Admin General Settings Section') }}</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-2">
                        <ul class="nav nav-pills flex-column" id="myTab4" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab4" data-toggle="tab" href="#home4" role="tab"
                                    aria-controls="home" aria-selected="true">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab4" data-toggle="tab" href="#profile4" role="tab"
                                    aria-controls="profile" aria-selected="false">Profile</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="contact-tab4" data-toggle="tab" href="#contact4" role="tab"
                                    aria-controls="contact" aria-selected="false">Contact</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-12 col-sm-12 col-md-10">
                        <div class="tab-content no-padding" id="myTab2Content">
                            <div class="tab-pane fade show active" id="home4" role="tabpanel"
                                aria-labelledby="home-tab4">
                                <div class="card border border-primary">
                                    <div class="card-body ">
                                        <form action="{{ route('admin.general-setting.update') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <div class="form-group">
                                                <label for="">{{ __('Website Name') }}</label>
                                                <input type="text" name="site_name" class="form-control" value="{{ $settings['site_name'] }}">
                                            </div>
                                            <div class="form-group">
                                                <img src="{{ asset($settings['site_logo']) }}" alt="" width="150"><br>
                                                <label for="">{{ __('Website Logo') }}</label>
                                                <input type="file" name="site_logo" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <img src="{{ asset($settings['site_favicon']) }}" alt="" width="150"><br>
                                                <label for="">{{ __('Website Favicon') }}</label>
                                                <input type="file" name="site_favicon" class="form-control">
                                            </div>
                                            <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="profile4" role="tabpanel" aria-labelledby="profile-tab4">
                                Sed sed metus vel lacus hendrerit tempus. Sed efficitur velit tortor, ac efficitur est
                                lobortis quis. Nullam lacinia metus erat, sed fermentum justo rutrum ultrices. Proin quis
                                iaculis tellus. Etiam ac vehicula eros, pharetra consectetur dui. Aliquam convallis neque
                                eget tellus efficitur, eget maximus massa imperdiet. Morbi a mattis velit. Donec hendrerit
                                venenatis justo, eget scelerisque tellus pharetra a.
                            </div>
                            <div class="tab-pane fade" id="contact4" role="tabpanel" aria-labelledby="contact-tab4">
                                Vestibulum imperdiet odio sed neque ultricies, ut dapibus mi maximus. Proin ligula massa,
                                gravida in lacinia efficitur, hendrerit eget mauris. Pellentesque fermentum, sem interdum
                                molestie finibus, nulla diam varius leo, nec varius lectus elit id dolor. Nam malesuada orci
                                non ornare vulputate. Ut ut sollicitudin magna. Vestibulum eget ligula ut ipsum venenatis
                                ultrices. Proin bibendum bibendum augue ut luctus.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
