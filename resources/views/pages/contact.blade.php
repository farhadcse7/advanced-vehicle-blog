@extends('layouts.app')
@section('title', getSiteSettings()->contact_meta_title ?: 'contact_meta_title')
@section('description', getSiteSettings()->contact_meta_desc ?: 'contact_meta_desc')
@section('keywords', getSiteSettings()->contact_meta_keywords ?: 'contact_meta_keywords')
@section('content')
    <!-- ======================= breadcrumb Start  ============================ -->
    <div class="breadcrumb_sec py-3">
        <div class="container">
            <nav>
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item active">Contact Us</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- ======================= breadcrumb End  ============================ -->

    <!-- ======================= Contact Start  ============================ -->
    <div class="contact_section pb-5 overflow-hidden">
        <div class="container">
            <div class="row gy-3 mb-5 justify-content-center">
                <div class="col-xl-4 col-md-6">
                    <div class="contact_item shadow-sm d-flex align-items-center">
                        <div class="contact_icon me-3">
                            <img src="{{ asset('/') }}assets/images/icons/phone-dark.svg" alt="Phone">
                        </div>
                        <div class="contact_body">
                            <h5 class="contact_title mb-2">Phone</h5>
                            <ul class="contact_info">
                                <li>
                                    <a href="Tel:+393246822222">{{ getSiteSettings()->phone }}</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6">
                    <div class="contact_item shadow-sm d-flex align-items-center">
                        <div class="contact_icon me-3">
                            <img src="{{ asset('/') }}assets/images/icons/email-dark.svg" alt="Email">
                        </div>
                        <div class="contact_body">
                            <h5 class="contact_title mb-2">Email</h5>
                            <ul class="contact_info">
                                <li>
                                    <a href="mailto:info@blog.com">{{ getSiteSettings()->email }}</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-8">
                    <div class="contact_item shadow-sm d-flex align-items-center">
                        <div class="contact_icon me-3">
                            <img src="{{ asset('/') }}assets/images/icons/location.svg" alt="Address">
                        </div>
                        <div class="contact_body">
                            <h5 class="contact_title mb-2">Address</h5>
                            <ul class="contact_info">
                                <li>{{ getSiteSettings()->address }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row gy-5">
                <div class="col-xl-6">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger mt-2">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="contact_form">
                        @php
                            $num1 = rand(1, 10);
                            $num2 = rand(1, 10);
                            $sum = $num1 + $num2;
                        @endphp
                        <form class="row" action="{{ route('savecontact') }}" method="post">
                            @csrf
                            <div class="col-md-6 mb-3">
                                <label for="name" class="form-label form--label">Name <span
                                        class="text-danger">*</span></label>
                                <input type="text" name="name" id="name" placeholder="Your Name"
                                    class="form-control shadow-none">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="email" class="form-label form--label">E-Mail <span
                                        class="text-danger">*</span></label>
                                <input type="email" name="email" id="email" placeholder="Enter E-Mail Address"
                                    class="form-control shadow-none">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="subject" class="form-label form--label">Subject <span
                                        class="text-danger">*</span></label>
                                <input type="text" name="subject" id="subject" placeholder="Write your subject"
                                    class="form-control shadow-none">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="message" class="form-label form--label">Your Message <span
                                        class="text-danger">*</span></label>
                                <textarea name="message" id="message" placeholder="Write your message" class="form-control shadow-none"
                                    rows="5"></textarea>
                            </div>
                            {{-- Math Captcha  --}}
                            <div class="col-md-12 mb-3">
                                <label for="captcha" class="form-label form--label">
                                    What is <strong>{{ $num1 }}</strong> + <strong>{{ $num2 }}</strong>?
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="hidden" name="captcha_answer" value="{{ $sum }}">
                                <input type="text" name="captcha" id="captcha" placeholder="Enter the Sum"
                                    class="form-control shadow-none" required>
                            </div>

                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary btn-sm px-5 text-uppercase">Submit</button>
                            </div>
                        </form>

                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="ratio ratio-16x9">
                        <iframe src="{{ getSiteSettings()->map_url }}" style="border:0; width:100%;" class="rounded"
                            allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ======================= Contact End  ============================ -->
@endsection
