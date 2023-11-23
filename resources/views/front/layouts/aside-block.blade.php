<?php
$popular = \App\Models\Article::all()->take(6);
$latest = \App\Models\Article::orderBy('created_at', 'desc')->take(6)->get();
$categories = \App\Models\Category::all();
?>
<div class="col-md-3">
    <!-- ======= Sidebar ======= -->
    <div class="aside-block">

        <ul class="nav nav-pills custom-tab-nav mb-4" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="pills-popular-tab" data-bs-toggle="pill" data-bs-target="#pills-popular" type="button" role="tab" aria-controls="pills-popular" aria-selected="true">Популярні</button>
            </li>
{{--            <li class="nav-item" role="presentation">--}}
{{--                <button class="nav-link" id="pills-trending-tab" data-bs-toggle="pill" data-bs-target="#pills-trending" type="button" role="tab" aria-controls="pills-trending" aria-selected="false">Trending</button>--}}
{{--            </li>--}}
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-latest-tab" data-bs-toggle="pill" data-bs-target="#pills-latest" type="button" role="tab" aria-controls="pills-latest" aria-selected="false">Останні</button>
            </li>
        </ul>

        <div class="tab-content" id="pills-tabContent">

            <!-- Popular -->
            <div class="tab-pane fade show active" id="pills-popular" role="tabpanel" aria-labelledby="pills-popular-tab">
                @foreach($popular as $article)
                    <div class="post-entry-1 border-bottom">
                        <div class="post-meta">
                            @foreach($article->categories as $category)
                                <a href="{{ route('category.post', $category->id) }}">
                                    <span class="date">{{ $category->name }}</span>
                                </a>
                            @endforeach
                            <span class="mx-1">&bullet;</span>
                            <span>{{ \Carbon\Carbon::parse($article->created_at)->translatedFormat('d F Y') }}</span>
                        </div>

                        <h2 class="mb-2"><a href="{{ route('show.article', $article->id) }}">{{ $article->title }}</a></h2>
                        <span class="author mb-3 d-block">{{ $article->user?->name }}</span>
                    </div>
                @endforeach

            </div> <!-- End Popular -->

            <!-- Latest -->
            <div class="tab-pane fade" id="pills-latest" role="tabpanel" aria-labelledby="pills-latest-tab">
                @foreach($latest as $article)
                    <div class="post-entry-1 border-bottom">
                        <div class="post-meta">
                            @foreach($article->categories as $category)
                                <span class="date">{{ $category->name }}</span>
                            @endforeach
                            <span class="mx-1">&bullet;</span> <span>{{ \Carbon\Carbon::parse($article->created_at)->diffForHumans() }}</span></div>
                        <h2 class="mb-2"><a href="{{ route('show.article', $article->id) }}">{{ $article->title }}</a></h2>
                        <span class="author mb-3 d-block">{{ $article->user?->name }}</span>
                    </div>
                @endforeach

            </div>

        </div>
    </div>
    @if(request()->is('front/article/*'))
        @php
            $articleId = request()->segment(3);
            $currentArticle = \App\Models\Article::find($articleId);
        @endphp
    <div class="aside-block">
        <h3 class="aside-title">Відео</h3>
        <div class="video-post">
            <a href="https://www.youtube.com/watch?v=AiFfDjmd0jU" class="glightbox link-video">
                <span class="bi-play-fill"></span>
                <img src="{{ asset('assets/img/post-landscape-5.jpg') }}" alt="" class="img-fluid">
            </a>
        </div>
    </div>
    @endif

    <div class="aside-block">
        <h3 class="aside-title">Категорії</h3>
        <ul class="aside-links list-unstyled">
            @foreach($categories as $category)
                <li><a href="{{ route('category.post', $category->id) }}"><i class="bi bi-chevron-right"></i> {{ $category->name }}</a></li>
            @endforeach
        </ul>
    </div>
</div>

