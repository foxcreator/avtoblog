<section class="category-section">
    <div class="container" data-aos="fade-up">
        @foreach($randomCategories as $index => $category)
            @if(count($category->articles) > 0)
            @php $isEvenIteration = $index % 2 == 0; @endphp
            <div class="section-header d-flex justify-content-between align-items-center mb-5">
                <h2>{{ $category->name }}</h2>
                <div><a href="{{ route('category.post', $category->id) }}" class="more">Переглянути все у {{ $category->name }}</a></div>
            </div>

            <div class="row">
                <div class="col-md-9">
                    @if($isEvenIteration)
                        @foreach($category->articles->take(3) as $article)
                            <div class="d-lg-flex post-entry-2 justify-content-start row">
                                <div class="col-md-7">
                                    <a href="{{ route('show.article', $article->id) }}" class="me-4 thumbnail mb-4 mb-lg-0 d-inline-block">
                                        <img src="{{ asset($article->image) }}" alt="{{ $article->title }}" class="img-fluid">
                                    </a>
                                </div>
                                <div class="col-md-4">
                                    <div class="post-meta"><span class="date">{{ $category->name }}</span> <span class="mx-1">&bullet;</span>
                                        <span>{{ \Carbon\Carbon::make($article->created_at)->format('d.m.Y') }}</span></div>
                                    <h3><a href="{{ route('show.article', $article->id) }}">{{ $article->title }}</a></h3>
                                    <p>{{ $article->subtitle }}</p>
                                </div>
                            </div>
                        @endforeach
                    @else
                        @forelse($category->articles->shuffle()->take(3) as $article)
                            <div class="d-lg-flex post-entry-2 justify-content-start row">
                                <div class="col-md-4">
                                    <div class="post-meta"><span class="date">{{ $category->name }}</span> <span class="mx-1">&bullet;</span>
                                        <span>{{ \Carbon\Carbon::make($article->created_at)->format('d.m.Y') }}</span></div>
                                    <h3><a href="{{ route('show.article', $article->id) }}">{{ $article->title }}</a></h3>
                                    <p>{{ $article->subtitle }}</p>
                                </div>
                                <div class="col-md-7">
                                    <a href="{{ route('show.article', $article->id) }}" class="ms-4 thumbnail mb-4 mb-lg-0 d-inline-block">
                                        <img src="{{ asset($article->image)}}" alt="{{ $article->title }}" class="img-fluid">
                                    </a>
                                </div>
                            </div>
                        @empty
                            {{-- No articles found in this category. --}}
                        @endforelse
                    @endif
                </div>

                <div class="col-md-3">
                    @forelse($isEvenIteration ? $category->articles->take(3) : $category->articles->shuffle()->take(3) as $article)
                        <div class="post-entry-1 border-bottom">
                            <div class="post-meta"><span class="date">{{ $category->name }}</span> <span class="mx-1">&bullet;</span>
                                <span>{{ \Carbon\Carbon::make($article->created_at)->format('d.m.Y') }}</span></div>
                            <h2 class="mb-2"><a href="{{ route('show.article', $article->id) }}">{{ $article->title }}</a></h2>
                            <span class="author mb-3 d-block">{{ $article->user?->name }}</span>
                        </div>
                    @empty
                        {{-- No articles found in this category. --}}
                    @endforelse
                </div>
            </div>
            @endif
        @endforeach
    </div>
</section>
