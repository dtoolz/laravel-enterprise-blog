@extends('admin.layouts.master')

@section('content')
    <div class="section">
        <div class="section-header">
            <h1>{{ __('Advertisement') }}</h1>
        </div>
        <div class="card card-primary">
            <div class="card-header">
                <h4>{{ __('Handle Adverts') }}</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.advert.update', 1) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <h5 class="text-primary">{{ __('Home Page Adverts') }}</h5>
                    <div class="form-group">
                        <img src="{{ asset($advert->home_top_bar_advert) }}" width="200px" alt="">
                        <br>
                        <label for="">{{ __('Top bar advert') }}</label>
                        <input name="home_top_bar_advert" type="file" class="form-control" >
                        @error('home_top_bar_advert')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                        <label for="" class="mt-3">{{ __('Top bar advert url') }}</label>
                        <input name="home_top_bar_advert_url" value="{{ $advert->home_top_bar_advert_url }}" type="text" class="form-control" >
                        @error('home_top_bar_advert_url')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                        <label class="custom-switch mt-2">
                            <input
                                {{ $advert->home_top_bar_advert_status == 1 ? 'checked' : '' }}
                                name="home_top_bar_advert_status"
                                value="1" type="checkbox" class="custom-switch-input toggle-status">
                            <span class="custom-switch-indicator"></span>
                        </label>
                    </div>
                    <div class="form-group">
                        <img src="{{ asset($advert->home_middle_page_advert) }}" width="200px" alt="">
                        <br>
                        <label for="">{{ __('Home Middle Page Advert') }}</label>
                        <input name="home_middle_page_advert" type="file" class="form-control" >
                        @error('home_middle_page_advert')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                        <label for="" class="mt-3">{{ __('Home Middle Page Advert Url') }}</label>
                        <input name="home_middle_page_advert_url" value="{{ $advert->home_middle_page_advert_url }}" type="text" class="form-control" >
                        @error('home_middle_page_advert_url')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                        <label class="custom-switch mt-2">
                            <input
                                {{ $advert->home_middle_page_advert_status == 1 ? 'checked' : '' }}
                                name="home_middle_page_advert_status"
                                value="1" type="checkbox" class="custom-switch-input toggle-status">
                            <span class="custom-switch-indicator"></span>
                        </label>
                    </div>
                    <h5 class="text-primary">{{ __('News Details Page Adverts') }}</h5>
                    <div class="form-group">
                        <img src="{{ asset($advert->news_details_page_advert) }}" width="200px" alt="">
                        <br>
                        <label for="">{{ __('News Details Page Advert') }}</label>
                        <input name="news_details_page_advert" type="file" class="form-control" >
                        @error('news_details_page_advert')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                        <label for="" class="mt-3">{{ __('News Details Page Advert Url') }}</label>
                        <input name="news_details_page_advert_url" value="{{ $advert->news_details_page_advert_url }}"  type="text" class="form-control" >
                        @error('news_details_page_advert_url')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                        <label class="custom-switch mt-2">
                            <input
                                {{ $advert->news_details_page_advert_status == 1 ? 'checked' : '' }}
                                name="news_details_page_advert_status"
                                value="1" type="checkbox" class="custom-switch-input toggle-status">
                            <span class="custom-switch-indicator"></span>
                        </label>
                    </div>
                    <h5 class="text-primary">{{ __('News Search Page Adverts') }}</h5>
                    <div class="form-group">
                        <img src="{{ asset($advert->news_page_advert) }}" width="200px" alt="">
                        <br>
                        <label for="">{{ __('News Search Page Advert') }}</label>
                        <input name="news_page_advert" type="file" class="form-control" >
                        @error('news_page_advert')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                        <label for="" class="mt-3">{{ __('News Search Page Advert Url') }}</label>
                        <input name="news_page_advert_url"  value="{{ $advert->news_page_advert_url }}" type="text" class="form-control" >
                        @error('news_page_advert_url')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                        <label class="custom-switch mt-2">
                            <input
                            {{ $advert->news_page_advert_status == 1 ? 'checked' : '' }}
                                name="news_page_advert_status"
                                value="1" type="checkbox" class="custom-switch-input toggle-status">
                            <span class="custom-switch-indicator"></span>
                        </label>
                    </div>
                    <h5 class="text-primary">{{ __('Sidebar Adverts') }}</h5>
                    <div class="form-group">
                        <img src="{{ asset($advert->side_bar_advert) }}" width="200px" alt="">
                        <br>
                        <label for="">{{ __('Sidebar Advert') }}</label>
                        <input name="side_bar_advert" type="file" class="form-control" >
                        @error('side_bar_advert')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                        <label for="" class="mt-3">{{ __('Sidebar Advert Url') }}</label>
                        <input name="side_bar_advert_url" value="{{ $advert->side_bar_advert_url }}" type="text" class="form-control" >
                        @error('side_bar_advert_url')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                        <label class="custom-switch mt-2">
                            <input
                                {{ $advert->side_bar_advert_status == 1 ? 'checked' : '' }}
                                name="side_bar_advert_status"
                                value="1" type="checkbox" class="custom-switch-input toggle-status">
                            <span class="custom-switch-indicator"></span>
                        </label>
                    </div>
                    <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
                </form>
            </div>
        </div>
    </div>
@endsection
