@extends('front.layouts.app')

@section('title')
    Contact US
@endsection

@section('style')
    <style>
        [type=email], [type=number], [type=tel], [type=url] {
            direction: unset;
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
                        <h3>{{ __('website.contact_us') }}</h3>
                        <ul>
                            <li><a href="{{route('home')}}">{{ __('website.home') }}</a></li>
                            <li>{{ __('website.contact_us') }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs area end-->

    <!--contact area start-->
    <div class="contact_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <div class="contact_message content">
                        <h3>{{ __('website.contact_us') }}</h3>
                        <p>{!! isset($website_setting) && $website_setting!=null ? getDefaultValueKey($website_setting->description) : '' !!}</p>
                        <ul>
                            @if(isset($website_setting) && $website_setting!=null && $website_setting->address!=null)
                                <li>
                                    <i class="fa fa-fax"></i>{{ __('website.address') }} {{getDefaultValueKey($website_setting->address)}}
                                </li>
                            @endif
                            <li><i class="fa fa-envelope-o"></i>
                                <a href="mailto:{{$website_setting->support_email}}">{{$website_setting->support_email}}</a>
                            </li>
                            <li><i class="fa fa-phone"></i>
                                <a href="tel:{{$website_setting->support_phone}}">{{$website_setting->support_phone}}</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="contact_message form">
                        <h3>{{ __('website.tell_us_your_needs') }}</h3>
                        <form id="contact-form" method="POST"
                              action="https://demo.hasthemes.com/lukani-preview-v1/lukani/assets/mail.php">
                            <p>
                                <label>{{ __('website.name_required') }}</label>
                                <input name="name" placeholder="{{ __('website.name') }} *" type="text">
                            </p>
                            <p>
                                <label>{{ __('website.email_required') }}</label>
                                <input name="email" placeholder="{{ __('website.email') }} *" type="email">
                            </p>
                            <p>
                                <label>{{ __('website.subject') }}</label>
                                <input name="subject" placeholder="{{ __('website.subject') }} *" type="text">
                            </p>
                            <div class="contact_textarea">
                                <label>{{ __('website.message_required') }}</label>
                                <textarea placeholder="{{ __('website.message') }} *" name="message"
                                          class="form-control2"></textarea>
                            </div>
                            <button type="submit">{{ __('website.send') }}</button>
                            <p class="form-messege"></p>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--contact area end-->

    <!--contact map start-->
    <iframe
        src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d16604.953228624305!2d30.912638308153376!3d28.964800324359814!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x145a334fb82b21b7%3A0x605dbd9b86a2bb84!2z2YXZhti02KfYqSDYo9io2Ygg2YXZhNmK2K3YjCDYqNiv2YfZhNiMINmF2LHZg9iyINiz2YXYs9i32KfYjCDZhdit2KfZgdi42Kkg2KjZhtmKINiz2YjZitmB!5e0!3m2!1sar!2seg!4v1764414614739!5m2!1sar!2seg"
        width="100%" height="460" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false"
        tabindex="0"></iframe>
    <!--contact map end-->
@endsection

@section('script') @endsection
