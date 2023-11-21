

<section class="category-section">
    <div class="container" data-aos="fade-up">
        @foreach($randomCategories as $category)
            <div class="section-header d-flex justify-content-between align-items-center mb-5">
                <h2>{{ $category->name }}</h2>
                <div><a href="{{ route('category.post', $category->id) }}" class="more">Переглянути все у {{ $category->name }}</a></div>
            </div>

            <div class="row">
                <div class="col-md-9">
                    @if($loop->iteration % 2 != 0 && $category->articles)
                        @foreach($category->articles->random(0, 4) as $article)
                            <div class="d-lg-flex post-entry-2">
                                <a href="{{ route('show.article', $article->id) }}" class="me-4 thumbnail mb-4 mb-lg-0 d-inline-block">
                                    <img src="{{ asset($article->image) }}" alt="" class="img-fluid">
                                </a>
                                <div>
                                    <div class="post-meta"><span class="date">{{ $category->name }}</span> <span class="mx-1">&bullet;</span>
                                        <span>{{ \Carbon\Carbon::make($article->created_at)->format('d.m.Y') }}</span></div>
                                    <h3><a href="{{ route('show.article', $article->id) }}">{{ $article->title }}</a></h3>
                                    <p>{{ $article->subtitle }}</p>

                                </div>
                            </div>
                        @endforeach
                    @elseif(isset($article))
                        <div class="d-lg-flex post-entry-2">
                            <div>
                                <div class="post-meta"><span class="date">{{ $category->name }}</span> <span class="mx-1">&bullet;</span>
                                    <span>{{ \Carbon\Carbon::make($article->created_at)->format('d.m.Y') }}</span></div>
                                <h3><a href="{{ route('show.article', $article->id) }}">{{ $article->title }}</a></h3>
                                <p>{{ $article->subtitle }}</p>

                            </div>
                            <a href="{{ route('show.article', $article->id) }}" class="ms-4 thumbnail mb-4 mb-lg-0 d-inline-block">
                                <img src="{{ asset($article->image)}}" alt="" class="img-fluid">
                            </a>
                        </div>
                    @endif
                </div>

                <div class="col-md-3">
                    @if($category->articles)
                    @foreach($category->articles as $article)
                        <div class="post-entry-1 border-bottom">
                            <div class="post-meta"><span class="date">{{ $category->name }}</span> <span class="mx-1">&bullet;</span>
                                <span>{{ \Carbon\Carbon::make($article->created_at)->format('d.m.Y') }}</span></div>
                            <h2 class="mb-2"><a href="single-post.html">{{ $article->title }}</a></h2>
                            <span class="author mb-3 d-block">Jenny Wilson</span>
                        </div>
                    @endforeach
                    @endif
                </div>
            </div>
        @endforeach
    </div>
</section>
