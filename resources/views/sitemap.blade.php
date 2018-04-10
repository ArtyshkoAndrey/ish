<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <url>
        <loc>{{url('') . "/" }}</loc>
        <lastmod>2018-04-11</lastmod>
        <changefreq>month</changefreq>
        <priority>1</priority>
    </url>
    @foreach ($posts as $post)
    <url>
        <loc>{{url('post') . "/" . $post->slug }}</loc>
        <lastmod>{{ Carbon\Carbon::parse($post->cteated_at)->format('Y-m-d') }}</lastmod>
        <changefreq>month</changefreq>
        <priority>0.8</priority>
    </url>
    @endforeach
        @foreach ($categories as $category)
            <url>
                <loc>{{url('post/category') . "/" . $category->slug }}</loc>
                <lastmod>{{ Carbon\Carbon::parse($category->cteated_at)->format('Y-m-d') }}</lastmod>
                <changefreq>month</changefreq>
                <priority>0.6</priority>
            </url>
        @endforeach
        @foreach ($tags as $tag)
            <url>
                <loc>{{url('post/tag') . "/" . $tag->slug }}</loc>
                <lastmod>{{ Carbon\Carbon::parse($tag->cteated_at)->format('Y-m-d') }}</lastmod>
                <changefreq>month</changefreq>
                <priority>0.6</priority>
            </url>
        @endforeach

</urlset>