@extends('layouts.app')
@section('title', 'Home')
@section('content')
    <!-- ======================= Blog Start  ============================ -->
    <div class="blog_section bg-white overflow-hidden pt-4 pb-4">
        <div class="container">
            <div class="row g-4">
                <div class="col-xl-3 order-xl-2">
                    @include('layouts.partials.sidebar')
                </div>
                <div class="col-xl-9 order-xl-1">
                    <div class="blog_wrapper">
                        <div class="row gy-4">

                            <!-- blog post -->
                            @foreach ($posts as $post)
                                <div class="col-md-6">
                                    <div class="blog_post p-3 p-lg-4 card h-100 bg-transparent shadow-sm border-opacity-10">
                                        <div class="blog_img mb-4 position-relative">
                                            <a href="{{ route('blog.show', $post->slug) }}">
                                                <img class="img-fluid rounded z-3"
                                                    src="{{ asset('assets/images/blog/' . $post->img) }}"
                                                    alt="{{ $post->img }}">
                                            </a>
                                        </div>
                                        <div class="blog_content card-body p-0">
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
                                                        <div class="date">
                                                            <span>{{ $post->created_at->format('d M, Y') }}</span>
                                                        </div>
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
                                            <h3 class="mb-3">
                                                <a href="{{ route('blog.show', $post->slug) }}">{{ $post->title }}</a>
                                            </h3>
                                            <div class="blog_desc mb-2">
                                                {{ Str::limit($post->description, 100, '...') }}
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="card-footer mt-2 bg-transparent border-0 blog_content p-0">
                                            <a class="learn_more" href="{{ route('blog.show', $post->slug) }}">Read More</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                        <div class="btn-readmore mt-5 text-center">
                            <a class="readmoreanhr btn btn-primary" href="{{ route('blogs.index') }}">See More Post</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ======================= Blog End  ============================ -->
@endsection
