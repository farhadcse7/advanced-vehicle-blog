<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <!-- Home Page -->
    <url>
        <loc>{{ url('/') }}</loc>
        <priority>1.0</priority>
        <changefreq>daily</changefreq>
    </url>

    <!-- Common Pages -->
    <url>
        <loc>{{ route('blogs.index') }}</loc>
        <priority>0.8</priority>
        <changefreq>weekly</changefreq>
    </url>
    <url>
        <loc>{{ route('about.index') }}</loc>
        <priority>0.5</priority>
        <changefreq>yearly</changefreq>
    </url>
    <url>
        <loc>{{ route('disclaimer.index') }}</loc>
        <priority>0.5</priority>
        <changefreq>yearly</changefreq>
    </url>
    <url>
        <loc>{{ route('privacy.index') }}</loc>
        <priority>0.5</priority>
        <changefreq>yearly</changefreq>
    </url>
    <url>
        <loc>{{ route('terms.index') }}</loc>
        <priority>0.5</priority>
        <changefreq>yearly</changefreq>
    </url>
    <url>
        <loc>{{ route('sitemap.index') }}</loc>
        <priority>0.4</priority>
        <changefreq>monthly</changefreq>
    </url>

    <!-- Categories -->
    @foreach ($categories as $category)
        <url>
            <loc>{{ route('category.show', $category->slug) }}</loc>
            <priority>0.6</priority>
            <changefreq>weekly</changefreq>
        </url>
    @endforeach

</urlset>
