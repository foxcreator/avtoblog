<section id="posts" class="posts">
    <div class="container" data-aos="fade-up">
        <div class="row g-5">
            <div class="col-lg-4">
                @foreach($articles as $article)
                    @if($loop->iteration <=1)
                    <div class="post-entry-1 lg">
                        <a href="{{ route('show.article', $article->id) }}"><img src="{{ $article->image }}" alt="{{ $article->title }}" class="img-fluid"></a>
                        <div class="post-meta">
                            @foreach($article->categories as $category)
                            <span class="date">{{ $category->name }}</span>
                            @endforeach
                            <span class="mx-1">&bullet;</span>
                            <span>{{ \Carbon\Carbon::make($article->created_at)->translatedFormat('d F Y') }}</span>
                        </div>
                        <h2><a href="{{ route('show.article', $article->id) }}">{{ $article->title }}</a></h2>
                        <p class="mb-4 d-block">{{ $article->subtitle }}</p>
                    </div>
                    @endif
                @endforeach
            </div>

            <div class="col-lg-8">
                <div class="row g-5">
                    <div class="col-lg-4 border-start custom-border">
                        @foreach($articles as $article)
                            @if($loop->iteration > 1 && $loop->iteration <= 4)
                        <div class="post-entry-1">
                            <a href="{{ route('show.article', $article->id) }}"><img src="{{ $article->image }}" alt="{{ $article->title }}" class="img-fluid"></a>
                            <div class="post-meta">
                                @foreach($article->categories as $category)
                                    <span class="date">{{ $category->name }}</span>
                                @endforeach
                                <span class="mx-1">&bullet;</span>
                                <span>{{ \Carbon\Carbon::make($article->created_at)->translatedFormat('d F Y') }}</span>
                            </div>
                            <h2><a href="{{ route('show.article', $article->id) }}">{{ $article->title }}</a></h2>
                        </div>
                            @endif
                        @endforeach
                    </div>
                    <div class="col-lg-4 border-start custom-border">
                        @foreach($articles as $article)
                            @if($loop->iteration > 4 && $loop->iteration <= 7)
                                <div class="post-entry-1">
                                    <a href="{{ route('show.article', $article->id) }}"><img src="{{ $article->image }}" alt="{{ $article->title }}" class="img-fluid"></a>
                                    <div class="post-meta">
                                        @foreach($article->categories as $category)
                                            <span class="date">{{ $category->name }}</span>
                                        @endforeach
                                        <span class="mx-1">&bullet;</span> <span>{{ \Carbon\Carbon::make($article->created_at)->translatedFormat('d F Y') }}</span></div>
                                    <h2><a href="{{ route('show.article', $article->id) }}">{{ $article->title }}</a></h2>
                                </div>
                            @endif
                        @endforeach
                    </div>

                    <!-- Trending Section -->
                    <div class="col-lg-4">
                        <div class="trending">
                            <h3>Популярне</h3>
                            <ul class="trending-post">
                                @foreach($randomArticles as $article)
                                        <li>
                                            <a href="{{ route('show.article', $article->id) }}">
                                                <h3>{{ $article->title }}</h3>
                                                @foreach($article->categories as $category)
                                                    @if($loop->last)
                                                        <span class="author">
                                                            {{ $category->name }}
                                                        </span>
                                                    @else
                                                        <span class="author">
                                                            {{ $category->name }},x
                                                        </span>
                                                    @endif
                                                @endforeach
                                            </a>
                                        </li>
                                @endforeach
                            </ul>
                        </div>

                    </div>
                </div>
            </div>

        </div> <!-- End .row -->
    </div>
</section>
