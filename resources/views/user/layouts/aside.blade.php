
    <aside class="col-lg-4">
        <!-- Widget [Search Bar Widget]-->
        <div class="widget search">
            <header>
                <h3 class="h6">Поиск по записям</h3>
            </header>
            <form action="{{route('search')}}" method="post" class="search-form">
                <div class="form-group">
                    <input type="search" name="search" id="search" placeholder="Введите текст">
                    <button type="submit" class="submit">
                        <i class="icon-search"></i>
                    </button>
                    {{ csrf_field() }}
                </div>
            </form>
        </div>
        <!-- Widget [Latest Posts Widget]        -->
        <div class="widget latest-posts">
            <header>
                <h3 class="h6">Последние записи</h3>
            </header>
            <div class="blog-posts">

                @forelse($aside_articles as $aside_article)

                <a href="{{route('post', $aside_article->slug)}}">
                    <div class="item d-flex align-items-center">
                        <div class="image">
                            <img src="{{ asset('/upload/post_header/' . $aside_article->image) }}" alt="..." class="img-fluid">
                        </div>
                        <div class="title">
                            <strong>{{$aside_article->title}}</strong>
                            <div class="d-flex align-items-center">
                                <div class="views">
                                    <i class="icon-eye"></i> {{$aside_article->viewed}}</div>
                                <div class="date">
                                    <i class="icon-clock"></i>
                                    {{$aside_article->created_at}}
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
                @empty
                    <p>Нет записей</p>
                @endforelse

            </div>
        </div>
        <!-- Widget [Categories Widget]-->
        <div class="widget categories">
            <header>
                <h3 class="h6">Категории</h3>
            </header>
            @forelse($categories as $category)
                <div class="item d-flex justify-content-between">
                    <a href="{{route('category', $category->slug)}}">{{$category->name}}</a>
                    {{ $category->article($category->id) }}
                </div>
            @empty
                <p>Нет категорий</p>
            @endforelse
        </div>
        <!-- Widget [Tags Cloud Widget]-->
        <div class="widget tags">
            <header>
                <h3 class="h6">Теги</h3>
            </header>
            <ul class="list-inline">
                @forelse($tags as $tag)
                <li class="list-inline-item">
                    <a href="{{route('tag',$tag->slug)}}" class="tag"># {{$tag->name}}</a>
                </li>
                @empty
                    Тегов нет
                @endforelse
            </ul>
        </div>
    </aside>