@extends('front.layouts.app')

@section('title')
    {{ __('website.gallery') }}
@endsection

@section('style')
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/justifiedGallery/3.8.1/css/justifiedGallery.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/1.10.0/css/lightgallery.min.css">
    <style>
        .justified-gallery > a > img {
            -webkit-transition: -webkit-transform 0.15s ease 0s;
            -moz-transition: -moz-transform 0.15s ease 0s;
            -o-transition: -o-transform 0.15s ease 0s;
            transition: transform 0.15s ease 0s;
            -webkit-transform: scale3d(1, 1, 1);
            transform: scale3d(1, 1, 1);
            height: 100%;
            width: 100%;
        }

        .justified-gallery > a:hover > img {
            -webkit-transform: scale3d(1.1, 1.1, 1.1);
            transform: scale3d(1.1, 1.1, 1.1);
        }
    </style>
@endsection

@section('content')
    <!--breadcrumbs area start-->
    <div class="breadcrumbs_area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <h3>{{ __('website.gallery') }}</h3>
                        <ul>
                            <li><a href="{{route('home')}}">{{ __('website.home') }}</a></li>
                            <li>{{ __('website.gallery') }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs area end-->

    <div class="container" style="margin-top: 100px; margin-bottom: 100px;">
        @if($galleries->isNotEmpty())
            <div id="justified-gallery" class="justified-gallery">
                @foreach($galleries as $gallery)
                    <a href="{{Storage::url($gallery->image)}}">
                        <img src="{{Storage::url($gallery->image)}}"
                             alt="{{getDefaultValueKey($gallery->title)}}"
                             class="lazyload">
                    </a>
                @endforeach
            </div>
        @endif
    </div>
@endsection

@section('script')
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/justifiedGallery/3.8.1/js/jquery.justifiedGallery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/1.10.0/js/lightgallery-all.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#justified-gallery').justifiedGallery({
                rowHeight: 250,
                margins: 10
            }).on('jg.complete', function () {
                $(this).lightGallery({
                    thumbnail: true,
                    animateThumb: false,
                    showThumbByDefault: false
                });
            });
        });
    </script>
@endsection
