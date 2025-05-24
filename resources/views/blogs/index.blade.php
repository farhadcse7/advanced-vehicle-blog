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
    <!-- ======================= Blog Start  ============================ -->
    <div class="blog_section bg-white overflow-hidden pt-4 pb-4">
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
                    <div class="blog_wrapper">
                        <div class="row gy-4">
                            <!-- blog post -->
                            <div class="col-md-6">
                                <div class="blog_post p-3 p-lg-4 card h-100 bg-transparent shadow-sm border-opacity-10">
                                    <div class="blog_img mb-4 position-relative">
                                        <a href="details.html">
                                            <img class="img-fluid rounded z-3" src="assets/images/blog/car.jpg"
                                                alt="Health & Wellness">
                                        </a>
                                    </div>
                                    <div class="blog_content card-body p-0">
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
                                        <h3 class="mb-3">
                                            <a href="details.html">Exploring Italy with the Top Premium Car Rental
                                                Services</a>
                                        </h3>
                                        <div class="blog_desc mb-2">
                                            When it comes to experiencing the beauty and charm of Italy, there's no
                                            better way to explore its pi...
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="card-footer mt-2 bg-transparent border-0 blog_content p-0">
                                        <a class="learn_more" href="details.html">Read More</a>
                                    </div>
                                </div>
                            </div>
                            <!-- blog post -->
                            <div class="col-md-6">
                                <div class="blog_post p-3 p-lg-4 card h-100 bg-transparent shadow-sm border-opacity-10">
                                    <div class="blog_img mb-4 position-relative">
                                        <a href="details.html">
                                            <img class="img-fluid rounded z-3" src="assets/images/blog/car.jpg"
                                                alt="Health & Wellness">
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
                            </div>
                            <!-- blog post -->
                            <div class="col-md-6">
                                <div class="blog_post p-3 p-lg-4 card h-100 bg-transparent shadow-sm border-opacity-10">
                                    <div class="blog_img mb-4 position-relative">
                                        <a href="details.html">
                                            <img class="img-fluid rounded z-3" src="assets/images/blog/car.jpg"
                                                alt="Health & Wellness">
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
                            </div>
                            <!-- blog post -->
                            <div class="col-md-6">
                                <div class="blog_post p-3 p-lg-4 card h-100 bg-transparent shadow-sm border-opacity-10">
                                    <div class="blog_img mb-4 position-relative">
                                        <a href="details.html">
                                            <img class="img-fluid rounded z-3" src="assets/images/blog/car.jpg"
                                                alt="Health & Wellness">
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
                            <!-- blog post -->
                            <div class="col-md-6">
                                <div class="blog_post p-3 p-lg-4 card h-100 bg-transparent shadow-sm border-opacity-10">
                                    <div class="blog_img mb-4 position-relative">
                                        <a href="details.html">
                                            <img class="img-fluid rounded z-3" src="assets/images/blog/car.jpg"
                                                alt="Health & Wellness">
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
                                            <a href="details.html">Italian Adventures: A Guide to Luxurious Car
                                                Rentals for an Unforgettable Trip</a>
                                        </h3>
                                        <div class="blog_desc mb-2">
                                            Welcome to the enchanting world of Italy, where history, culture, and
                                            breathtaking landscapes blend...
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="card-footer mt-2 bg-transparent border-0 blog_content p-0">
                                        <a class="learn_more" href="details.html">Read More</a>
                                    </div>
                                </div>
                            </div>
                            <!-- blog post -->
                            <div class="col-md-6">
                                <div class="blog_post p-3 p-lg-4 card h-100 bg-transparent shadow-sm border-opacity-10">
                                    <div class="blog_img mb-4 position-relative">
                                        <a href="details.html">
                                            <img class="img-fluid rounded z-3" src="assets/images/blog/car.jpg"
                                                alt="Health & Wellness">
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
                                            <a href="details.html">The Contactless Revolution: Contactless Car
                                                Rental and the Future of Car Services</a>
                                        </h3>
                                        <div class="blog_desc mb-2">
                                            In the changing world of travel and transportation, one of the most
                                            important shifts in recent times...
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="card-footer mt-2 bg-transparent border-0 blog_content p-0">
                                        <a class="learn_more" href="details.html">Read More</a>
                                    </div>
                                </div>
                            </div>
                            <!-- blog post -->
                            <div class="col-md-6">
                                <div class="blog_post p-3 p-lg-4 card h-100 bg-transparent shadow-sm border-opacity-10">
                                    <div class="blog_img mb-4 position-relative">
                                        <a href="details.html">
                                            <img class="img-fluid rounded z-3" src="assets/images/blog/car.jpg"
                                                alt="Health & Wellness">
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
                                            <a href="details.html">Road Trip Royalty: Uncovering the Hidden Gems of
                                                Italy via Top Car Rental Services</a>
                                        </h3>
                                        <div class="blog_desc mb-2">
                                            Welcome, fellow travelers and adventure enthusiasts! Italy, with its rich
                                            history, vibrant culture...
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="card-footer mt-2 bg-transparent border-0 blog_content p-0">
                                        <a class="learn_more" href="details.html">Read More</a>
                                    </div>
                                </div>
                            </div>
                            <!-- blog post -->
                            <div class="col-md-6">
                                <div class="blog_post p-3 p-lg-4 card h-100 bg-transparent shadow-sm border-opacity-10">
                                    <div class="blog_img mb-4 position-relative">
                                        <a href="details.html">
                                            <img class="img-fluid rounded z-3" src="assets/images/blog/car.jpg"
                                                alt="Health & Wellness">
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
                                            <a href="details.html">How To Rent A Car In Italy For Family-friendly
                                                Travel</a>
                                        </h3>
                                        <div class="blog_desc mb-2">
                                            If you're planning a family-friendly adventure in Italy, renting a car can
                                            be a fantastic way to exp...
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="card-footer mt-2 bg-transparent border-0 blog_content p-0">
                                        <a class="learn_more" href="details.html">Read More</a>
                                    </div>
                                </div>
                            </div>
                            <!-- blog post -->
                            <div class="col-md-6">
                                <div class="blog_post p-3 p-lg-4 card h-100 bg-transparent shadow-sm border-opacity-10">
                                    <div class="blog_img mb-4 position-relative">
                                        <a href="details.html">
                                            <img class="img-fluid rounded z-3" src="assets/images/blog/car.jpg"
                                                alt="Health & Wellness">
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
                                            <a href="details.html">Navigating New Horizons: A Comprehensive Guide
                                                to Car Rental...</a>
                                        </h3>
                                        <div class="blog_desc mb-2">
                                            Whether you're planning a road trip, a business trip, or simply need a
                                            temporary set of wheels, rent...
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="card-footer mt-2 bg-transparent border-0 blog_content p-0">
                                        <a class="learn_more" href="details.html">Read More</a>
                                    </div>
                                </div>
                            </div>
                            <!-- blog post -->
                            <div class="col-md-6">
                                <div class="blog_post p-3 p-lg-4 card h-100 bg-transparent shadow-sm border-opacity-10">
                                    <div class="blog_img mb-4 position-relative">
                                        <a href="details.html">
                                            <img class="img-fluid rounded z-3" src="assets/images/blog/car.jpg"
                                                alt="Health & Wellness">
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
                                            <a href="details.html">Hidden Gems: Exploring Lesser-Known Attractions
                                                in ROME...</a>
                                        </h3>
                                        <div class="blog_desc mb-2">
                                            Regarding Rome city tour, Italy, people visit famous places like the
                                            Colosseum, Pantheon Rome, Palat...
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

                    <!-- pagination -->
                    <div class="pagination mt-5 mb-2 d-flex justify-content-center">
                        <ul class="pagination justify-content-center">
                            <li class="page-item disabled">
                                <a class="page-link">Previous</a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#">Next</a>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- ======================= Blog End  ============================ -->
@endsection
