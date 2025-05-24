@extends('layouts.app')
@section('title', 'Blog')
@section('content')
    <!-- ======================= breadcrumb Start  ============================ -->
    <div class="breadcrumb_sec py-3">
        <div class="container">
            <nav>
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item active">Blog</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- ======================= breadcrumb End  ============================ -->
    <!-- ======================= Blog Details Start  ============================ -->
    <div class="blog_details_section bg-white overflow-hidden pt-4 pb-4">
        <div class="container">
            <div class="row g-4">
                <div class="col-xl-3 order-xl-2">
                    <div class="blog_sidebar">
                        <div class="p-3 p-xl-4 border rounded">
                            <div class="card_header mb-4">
                                <h3>Categories</h3>
                            </div>
                            <div class="categories_list">
                                <ul>
                                    <li><a href="#">Technology</a></li>
                                    <li><a href="#">Health & Wellness</a></li>
                                    <li><a href="#">Travel</a></li>
                                    <li><a href="#">Food & Recipes</a></li>
                                    <li><a href="#">Lifestyle</a></li>
                                    <li><a href="#">Finance</a></li>
                                    <li><a href="#">Education</a></li>
                                    <li><a href="#">Entertainment</a></li>
                                    <li><a href="#">Sports</a></li>
                                    <li><a href="#">Fashion</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="p-3 p-xl-4 border rounded mt-2">
                            <div class="card_header mb-4">
                                <h3>Latest Posts</h3>
                            </div>
                            <div class="latestpost_list">
                                <ul>
                                    <li><a href="#">BMW car price updated 2024</a></li>
                                    <li><a href="#">BMW ECU Cloning</a></li>
                                    <li><a href="#">ECU Remaping of Toyota</a></li>
                                    <li><a href="#">BMW car price updated 2024</a></li>
                                    <li><a href="#">BMW ECU Cloning</a></li>
                                    <li><a href="#">ECU Remaping of Toyota</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-9 order-xl-1">
                    <div class="single_post blog_wrapper border p-3 p-xl-4 rounded">
                        <div class="single_photo mb-3">
                            <img src="{{ asset('assets/images/blog/'.$post->img) }}" class="rounded w-100" alt="{{ $post->img }}">
                        </div>
                        <div class="short_info d-sm-flex align-items-center mb-3">
                            <div class="mb-2 mb-sm-0 me-3">
                                <div class="d-flex align-items-center">
                                    <div class="icon me-1">
                                        <img src="assets/images/tag.svg" alt="Tag">
                                    </div>
                                    <div class="date"><span>{{ $post->category->title }}</span></div>
                                </div>
                            </div>
                            <div class="mb-2 mb-sm-0 me-3">
                                <div class="d-flex align-items-center">
                                    <div class="icon me-1">
                                        <img src="assets/images/calendar.svg" alt="Date">
                                    </div>
                                    <div class="date"><span>{{ $post->created_at->format('d M, Y') }}</span></div>
                                </div>
                            </div>
                            <div class="">
                                <div class="d-flex align-items-center">
                                    <div class="icon me-1">
                                        <img src="assets/images/eye.svg" alt="View">
                                    </div>
                                    <div class="date"><span>{{ $post->views }}</span></div>
                                </div>
                            </div>
                        </div>
                        <div class="title mb-3">
                            <h1>{{ $post->title }}</h1>
                        </div>
                        <div class="desc">
                            {{ $post->description }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ======================= Blog Details End  ============================ -->

    <!-- ======================= Related Post Start  ============================ -->
    <div class="related_section pt-4 pb-4 border-top">
        <div class="container">
            <div class="section_heading pb-4">
                <h1 class="section_title">You may also like</h1>
            </div>
            <div class="related_posts owl-theme owl-carousel">
                <!-- blog post -->
                <div class="blog_post p-3 p-lg-4 card h-100 bg-transparent shadow-sm border-opacity-10">
                    <div class="blog_img mb-4 position-relative">
                        <a href="details.html">
                            <img class="img-fluid rounded z-3" src="assets/images/blog/car.jpg" alt="Health & Wellness">
                        </a>
                    </div>
                    <div class="short_info d-sm-flex align-items-center mb-3">
                        <div class="mb-2 mb-sm-0 me-3">
                            <div class="d-flex align-items-center">
                                <div class="icon me-1">
                                    <img src="assets/images/tag.svg" alt="Tag">
                                </div>
                                <div class="date"><span>Health & Wellness</span></div>
                            </div>
                        </div>
                        <div class="mb-2 mb-sm-0 me-3">
                            <div class="d-flex align-items-center">
                                <div class="icon me-1">
                                    <img src="assets/images/calendar.svg" alt="Date">
                                </div>
                                <div class="date"><span>20 Nov, 2024</span></div>
                            </div>
                        </div>
                        <div class="">
                            <div class="d-flex align-items-center">
                                <div class="icon me-1">
                                    <img src="assets/images/eye.svg" alt="View">
                                </div>
                                <div class="date"><span>1297</span></div>
                            </div>
                        </div>
                    </div>
                    <div class="blog_content card-body p-0">
                        <h3 class="mb-3">
                            <a href="details.html">Car Rental For People With Disabilities in
                                Rome</a>
                        </h3>
                        <div class="blog_desc mb-2">
                            Traveling to Rome can be an exciting adventure, but it's important to ensure
                            that your journey is ac...
                        </div>
                    </div>
                    <hr>
                    <div class="card-footer mt-2 bg-transparent border-0 blog_content p-0">
                        <a class="learn_more" href="details.html">Read More</a>
                    </div>
                </div>
                <!-- blog post -->
                <div class="blog_post p-3 p-lg-4 card h-100 bg-transparent shadow-sm border-opacity-10">
                    <div class="blog_img mb-4 position-relative">
                        <a href="details.html">
                            <img class="img-fluid rounded z-3" src="assets/images/blog/car.jpg" alt="Health & Wellness">
                        </a>
                    </div>
                    <div class="short_info d-sm-flex align-items-center mb-3">
                        <div class="mb-2 mb-sm-0 me-3">
                            <div class="d-flex align-items-center">
                                <div class="icon me-1">
                                    <img src="assets/images/tag.svg" alt="Tag">
                                </div>
                                <div class="date"><span>Health & Wellness</span></div>
                            </div>
                        </div>
                        <div class="mb-2 mb-sm-0 me-3">
                            <div class="d-flex align-items-center">
                                <div class="icon me-1">
                                    <img src="assets/images/calendar.svg" alt="Date">
                                </div>
                                <div class="date"><span>20 Nov, 2024</span></div>
                            </div>
                        </div>
                        <div class="">
                            <div class="d-flex align-items-center">
                                <div class="icon me-1">
                                    <img src="assets/images/eye.svg" alt="View">
                                </div>
                                <div class="date"><span>1297</span></div>
                            </div>
                        </div>
                    </div>
                    <div class="blog_content card-body p-0">
                        <h3 class="mb-3">
                            <a href="details.html">The Best Time to Book Rental Car in Rome For The
                                Best Deal</a>
                        </h3>
                        <div class="blog_desc mb-2">
                            Planning a trip to Rome involves many exciting decisions, including
                            arranging transportation. While...
                        </div>
                    </div>
                    <hr>
                    <div class="card-footer mt-2 bg-transparent border-0 blog_content p-0">
                        <a class="learn_more" href="details.html">Read More</a>
                    </div>
                </div>
                <!-- blog post -->
                <div class="blog_post p-3 p-lg-4 card h-100 bg-transparent shadow-sm border-opacity-10">
                    <div class="blog_img mb-4 position-relative">
                        <a href="details.html">
                            <img class="img-fluid rounded z-3" src="assets/images/blog/car.jpg" alt="Health & Wellness">
                        </a>
                    </div>
                    <div class="short_info d-sm-flex align-items-center mb-3">
                        <div class="mb-2 mb-sm-0 me-3">
                            <div class="d-flex align-items-center">
                                <div class="icon me-1">
                                    <img src="assets/images/tag.svg" alt="Tag">
                                </div>
                                <div class="date"><span>Health & Wellness</span></div>
                            </div>
                        </div>
                        <div class="mb-2 mb-sm-0 me-3">
                            <div class="d-flex align-items-center">
                                <div class="icon me-1">
                                    <img src="assets/images/calendar.svg" alt="Date">
                                </div>
                                <div class="date"><span>20 Nov, 2024</span></div>
                            </div>
                        </div>
                        <div class="">
                            <div class="d-flex align-items-center">
                                <div class="icon me-1">
                                    <img src="assets/images/eye.svg" alt="View">
                                </div>
                                <div class="date"><span>1297</span></div>
                            </div>
                        </div>
                    </div>
                    <div class="blog_content card-body p-0">
                        <h3 class="mb-3">
                            <a href="details.html">5 Benefits Of Rental Car Insurance</a>
                        </h3>
                        <div class="blog_desc mb-2">
                            Whether you're embarking on a scenic road trip through the picturesque
                            landscapes of Italy or simply...
                        </div>
                    </div>
                    <hr>
                    <div class="card-footer mt-2 bg-transparent border-0 blog_content p-0">
                        <a class="learn_more" href="details.html">Read More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ======================= Related Post End  ============================ -->
@endsection
