<div class="blog_sidebar">
    <div class="p-3 p-xl-4 border rounded">
        <div class="card_header mb-4">
            <h3>Categories</h3>
        </div>
        <div class="categories_list">
            <ul>
                @foreach ($categories as $category)
                    <li><a href="{{ route('category.show', $category->slug) }}">{{ $category->title }}</a></li>
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
                    <li><a href="{{ route('blog.show', $latestPost->slug) }}">{{ $latestPost->title }}</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
