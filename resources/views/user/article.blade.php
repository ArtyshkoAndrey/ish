@extends('user/app')

@section('title', $article->title . " - Инженерная школа")
@section('meta_keyword', $article->meta_keywords)
@section('meta_description', $article->meta_description)
@section('author', $article->posted_by)

@section('styles')

    <link rel="stylesheet" href="{{ asset('css/news.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
    <style>
        .slider {
            width: 90%;
            margin-left: 5%;
        }
    </style>

@endsection

@section('content')
    @include('user.include.menu')
    <!-- Page Content -->
    <section>
        <div class="container">
            <div class="row">
                <!-- Latest Posts -->
                <main class="post blog-post col-lg-8">
                    <div class="container">
                        <div class="post-single">
                            <div class="post-thumbnail" style="width: 100%; overflow: hidden; max-height: 450px;">
                                <img src="{{ asset('/upload/post_header/' . $article->image) }}" alt="..." class="img-fluid">
                            </div>
                            <div class="post-details">
                                <div class="post-meta d-flex justify-content-between">
                                    <div class="category">
                                        @foreach ($article->categories as $category)
                                            <a href="{{ route('category',$category->slug) }}">{{ $category->name }}</a>
                                        @endforeach
                                    </div>
                                </div>
                                <h1>{{$article->title}}
                                    <a href="#">
                                        <i class="fa fa-bookmark-o"></i>
                                    </a>
                                </h1>
                                <div class="post-footer d-flex flex-column flex-sm-row">
                                    <a href="#" class="author d-flex align-items-center flex-wrap">
                                        <div class="avatar">
                                            <img src="{{asset('upload/admin/photo/' . $article->adminName->photo )}}" alt="..." class="img-fluid">
                                        </div>
                                        <div class="title">
                                            <span>{{$article->adminName->name}}</span>
                                        </div>
                                    </a>
                                    <div class="d-flex align-items-center flex-wrap">
                                        <div class="date">
                                            <i class="icon-clock"></i>
                                            {{$article->created_at}}
                                        </div>
                                        <div class="views">
                                            <i class="icon-eye"></i>
                                            {{$article->viewed}}
                                        </div>
                                    </div>
                                </div>
                                <div class="post-body">
                                    {!! $article->body !!}
                                </div>
                                <div class="post-tags">
                                    @foreach ($article->tags as $tag)
                                    <a href="{{ route('tag',$tag->slug) }}"  class="tag">#{{ $tag->name }}</a>
                                    @endforeach
                                </div>
                                <div class="posts-nav d-flex justify-content-between align-items-stretch flex-column flex-md-row">
                                    <a href="{{route('post', $prev_post->slug)}}" class="prev-post text-left d-flex align-items-center">
                                        <div class="icon prev">
                                            <i class="fa fa-angle-left"></i>
                                        </div>
                                        <div class="text">
                                            <strong class="text-primary">Предыдущая новость </strong>
                                            <h6>{{$prev_post->title}}</h6>
                                        </div>
                                    </a>
                                    <a href="{{route('post', $next_post->slug)}}" class="next-post text-right d-flex align-items-center justify-content-end">
                                        <div class="text">
                                            <strong class="text-primary">Следующая новость </strong>
                                            <h6>{{$next_post->title}}</h6>
                                        </div>
                                        <div class="icon next">
                                            <i class="fa fa-angle-right"> </i>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
                @include('user.layouts.aside')
            </div>
        </div>
    </section>
    @include('user.layouts.footer')

@endsection

@section('script')
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.js"></script>
    <script>
        $(document).ready(function(){
            $('.slider').slick({
                speed: 300,
                adaptiveHeight: true,
                autoplay: true,
                autoplaySpeed: 5000
            });
        });
    </script>
@endsection