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
                                    @foreach ($categories as $category)
                                        <li><a href="#">{{ $category->title }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="p-3 p-xl-4 border rounded mt-2">
                            <div class="card_header mb-4">
                                <h3>Latest Posts</h3>
                            </div>
                            <div class="latestpost_list">
                                <ul>
                                    @foreach ($latestPosts as $latestPost)
                                        <li><a
                                                href="{{ route('blog.show', $latestPost->slug) }}">{{ $latestPost->title }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-9 order-xl-1">
                    <div class="single_post blog_wrapper border p-3 p-xl-4 rounded">
                        <div class="single_photo mb-3">
                            <img src="{{ asset('assets/images/blog/' . $post->img) }}" class="rounded w-100"
                                alt="{{ $post->img }}">
                        </div>
                        <div class="short_info d-sm-flex align-items-center mb-3">
                            <div class="mb-2 mb-sm-0 me-3">
                                <div class="d-flex align-items-center">
                                    <div class="icon me-1">
                                        <img src="{{ asset('/') }}assets/images/tag.svg" alt="Tag">
                                    </div>
                                    <div class="date"><span>{{ $post->category->title }}</span></div>
                                </div>
                            </div>
                            <div class="mb-2 mb-sm-0 me-3">
                                <div class="d-flex align-items-center">
                                    <div class="icon me-1">
                                        <img src="{{ asset('/') }}assets/images/calendar.svg" alt="Date">
                                    </div>
                                    <div class="date"><span>{{ $post->created_at->format('d M, Y') }}</span></div>
                                </div>
                            </div>
                            <div class="">
                                <div class="d-flex align-items-center">
                                    <div class="icon me-1">
                                        <img src="{{ asset('assets/images/eye.svg') }}" alt="View">
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
                @foreach ($relatedPosts as $relatedPost)
                    <div class="blog_post p-3 p-lg-4 card h-100 bg-transparent shadow-sm border-opacity-10">
                        <div class="blog_img mb-4 position-relative">
                            <a href="details.html">
                                <img class="img-fluid rounded z-3" src="{{ asset('assets/images/blog/'.$relatedPost->img) }}"
                                    alt="Health & Wellness">
                            </a>
                        </div>
                        <div class="short_info d-sm-flex align-items-center mb-3">
                            <div class="mb-2 mb-sm-0 me-3">
                                <div class="d-flex align-items-center">
                                    <div class="icon me-1">
                                        <img src="{{ asset('assets/images/tag.svg') }}" alt="Tag">
                                    </div>
                                    <div class="date"><span>{{ $relatedPost->category->title }}</span></div>
                                </div>
                            </div>
                            <div class="mb-2 mb-sm-0 me-3">
                                <div class="d-flex align-items-center">
                                    <div class="icon me-1">
                                        <img src="{{ asset('assets/images/calendar.svg') }}" alt="Date">
                                    </div>
                                    <div class="date"><span>{{ $relatedPost->created_at->format('d M, Y') }}</span></div>
                                </div>
                            </div>
                            <div class="">
                                <div class="d-flex align-items-center">
                                    <div class="icon me-1">
                                        <img src="{{ asset('assets/images/eye.svg') }}" alt="View">
                                    </div>
                                    <div class="date"><span>{{ $relatedPost->views }}</span></div>
                                </div>
                            </div>
                        </div>
                        <div class="blog_content card-body p-0">
                            <h3 class="mb-3">
                                <a href="details.html">{{ $relatedPost->title }}</a>
                            </h3>
                            <div class="blog_desc mb-2">
                                {{ $relatedPost->description }}
                            </div>
                        </div>
                        <hr>
                        <div class="card-footer mt-2 bg-transparent border-0 blog_content p-0">
                            <a class="learn_more" href="{{ route('blog.show', $relatedPost->slug) }}">Read More</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- ======================= Related Post End  ============================ -->
@endsection
