@extends('user/app')

@section('title', "Новости - Инженерная школа")
@section('meta_keyword', "Мета слова")
@section('meta_description', "Мета описание")

@section('styles')

    <link rel="stylesheet" href="{{ asset('css/news.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
@endsection

@section('content')
    @include('user.include.menu')
<!-- Page Content -->
    <section>
        <div class="container">
            <div class="row">
                <main class="posts-listing col-lg-8">
                    <div class="container">
                        <div class="row">

                            @isset($top_post)
                                <div class="col-xl-12 pb-3">
                                    <h2 class="text-justify">Популярная новость</h2>
                                </div>
                                <div class="post col-xl-12">
                                    <div class="post-thumbnail" style="height: 300px;overflow: hidden;">
                                        <a href="{{route('post', $top_post->slug)}}">
                                            <img src="{{ asset('/upload/post_header/' . $top_post->image) }}" alt="..." class="img-fluid" style="width: 100%;">
                                        </a>
                                    </div>
                                    <div class="post-details">
                                        <div class="post-meta d-flex justify-content-between">
                                            <div class="date meta-last">{{$top_post->created_at}}</div>
                                            <div class="category">
                                                @foreach ($top_post->categories as $category)
                                                    <a href="{{route('category', $category)}}">{{ $category->name }}</a>
                                                @endforeach
                                            </div>
                                        </div>
                                        <a href="{{route('post', $top_post->slug)}}">
                                            <h3 class="h4">{{$top_post->title}}</h3>
                                        </a>
                                        <p class="text-muted">{!! $top_post->subtitle !!}</p>
                                        <footer class="post-footer d-flex align-items-center">
                                            <a href="#" class="author d-flex align-items-center flex-wrap">
                                                <div class="avatar">
                                                    <img src="{{asset('upload/admin/photo/' . $top_post->adminName->photo )}}" alt="..." class="img-fluid">
                                                </div>
                                                <div class="title">
                                                    <span>{{$top_post->adminName->name}}</span>
                                                </div>
                                            </a>
                                            <div class="comments meta-last">
                                                <i class="icon-eye"></i> {{$top_post->viewed}}</div>
                                        </footer>
                                    </div>
                                </div>

                                <div class="col-xl-12 pb-3">
                                    <h2 class="text-justify">Все новости</h2>
                                </div>
                            @endisset

                        @forelse($articles as $article)    
                            <!-- post -->
                            <div class="post col-xl-6">
                                <div class="post-thumbnail" style="height: 200px;overflow: hidden;">
                                    <a href="{{route('post', $article->slug)}}">
                                        <img src="{{ asset('/upload/post_header/' . $article->image) }}" alt="..." class="img-fluid" style="width: 100%;">
                                    </a>
                                </div>
                                <div class="post-details">
                                    <div class="post-meta d-flex justify-content-between">
                                        <div class="date meta-last">{{$article->created_at}}</div>
                                        <div class="category">
                                        @foreach ($article->categories as $category)
                                            <a href="{{route('category', $category)}}">{{ $category->name }}</a>
                                        @endforeach
                                        </div>
                                    </div>
                                    <a href="{{route('post', $article->slug)}}">
                                        <h3 class="h4">{{$article->title}}</h3>
                                    </a>
                                    <p class="text-muted">{!! $article->subtitle !!}</p>
                                    <footer class="post-footer d-flex align-items-center">
                                        <a href="#" class="author d-flex align-items-center flex-wrap">
                                            <div class="avatar">
                                                <img src="{{asset('upload/admin/photo/' . $article->adminName->photo )}}" alt="..." class="img-fluid">
                                            </div>
                                            <div class="title">
                                                <span>{{$article->adminName->name}}</span>
                                            </div>
                                        </a>
                                        <div class="comments meta-last">
                                                <i class="icon-eye"></i> {{$article->viewed}}</div>
                                    </footer>
                                </div>
                            </div>
                        @empty
                            <h2 style="padding-left:15px; padding-right: 15px;">Нет записей</h2>
                        @endforelse

                        </div>
                        <!-- Pagination -->
                        <nav aria-label="Page navigation example">

                            {{$articles->links('user.layouts.paginate')}}
                        </nav>
                    </div>
                </main>
                @include('user.layouts.aside')
            </div>
        </div>
    </section>
    @include('user.layouts.footer')
@endsection

@section('script')
@endsection