@extends('layouts.app')
@section('title', $post->meta_title ?: 'meta_title')
@section('description', $post->meta_desc ?: 'meta_desc')
@section('img', asset('assets/images/blog/' . $post->img) ?: 'post_img')
@section('keywords', $post->meta_keywords ?: 'meta_keywords')
@section('content')
    <!-- ======================= breadcrumb Start  ============================ -->
    <div class="breadcrumb_sec py-3">
        <div class="container">
            <nav>
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item active">{{ $post->title }}</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- ======================= breadcrumb End  ============================ -->
    <!-- banner advertisement start -->
    @if ($advertiseBanner->count() > 0)
        <div class="blog_section bg-white overflow-hidden pt-4 pb-4">
            <div class="container">
                @foreach ($advertiseBanner as $ad)
                    <div class="row g-4">
                        <div class="col-12">
                            <a target="_blank" href="{{ route('advertisement.clicks', $ad->id) }}">
                                <div class="ad-banner">
                                    <img src="{{ asset('assets/images/banner/' . $ad->img) }}" alt="{{ $ad->name }}"
                                        class="ad-image">
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
    @endif
    <!-- banner advertisement end -->
    <!-- ======================= Blog Details Start  ============================ -->
    <div class="blog_details_section bg-white overflow-hidden pt-4 pb-4">
        <div class="container">
            <div class="row g-4">
                <div class="col-xl-3 order-xl-2">
                    @include('layouts.partials.sidebar')
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
                            {!! $post->description !!}
                        </div>
                    </div>

                    {{-- disqus comment --}}
                    <div id="disqus_thread" class="mt-5"></div>

                    {{-- share this plugin --}}
                    <div class="sharethis-sticky-share-buttons"></div>

                </div>
            </div>
        </div>
    </div>
    <!-- ======================= Blog Details End  ============================ -->

    <!-- ======================= Related Post Start  ============================ -->
    @if ($relatedPosts->count() > 0)
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
                                <a href="{{ route('blog.show', $relatedPost->slug) }}">
                                    <img class="img-fluid rounded z-3"
                                        src="{{ asset('assets/images/blog/' . $relatedPost->img) }}"
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
                                        <div class="date">
                                            <span>{{ $relatedPost->created_at->format('d M, Y') }}</span>
                                        </div>
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
                                    <a href="{{ route('blog.show', $relatedPost->slug) }}">{{ $relatedPost->title }}</a>
                                </h3>
                                <div class="blog_desc mb-2">
                                    {!! $relatedPost->description !!}
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
    @endif
    <!-- ======================= Related Post End  ============================ -->
@endsection

@push('scripts')
    <script>
        /**
         *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
         *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables    */
        /*
        var disqus_config = function () {
        this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
        this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
        };
        */
        // (function() { // DON'T EDIT BELOW THIS LINE
        //     var d = document,
        //         s = d.createElement('script');
        //     s.src = 'https://https-github-com-csly2023.disqus.com/embed.js';
        //     s.setAttribute('data-timestamp', +new Date());
        //     (d.head || d.body).appendChild(s);
        // })();

        (function() { // DON'T EDIT BELOW THIS LINE
            var d = document,
                s = d.createElement('script');
            s.src = 'https://{{ getSiteSettings()->disqus }}.disqus.com/embed.js';
            s.setAttribute('data-timestamp', +new Date());
            (d.head || d.body).appendChild(s);
        })();
    </script>
    <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by
            Disqus.</a></noscript>

    {{-- share this plugin  --}}
    {{-- <script type='text/javascript'
        src='https://platform-api.sharethis.com/js/sharethis.js#property=683cd19798608700128ca0ad&product=sticky-share-buttons'
        async='async'></script> --}}
    <script type='text/javascript'
        src='https://platform-api.sharethis.com/js/sharethis.js#property={{ getSiteSettings()->shareplugin }}&product=sticky-share-buttons'
        async='async'></script>
@endpush
