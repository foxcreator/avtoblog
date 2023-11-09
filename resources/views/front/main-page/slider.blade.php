<section id="hero-slider" class="hero-slider">
    <div class="container-md" data-aos="fade-in">
        <div class="row">
            <div class="col-12">
                <div class="swiper sliderFeaturedPosts">
                    <div class="swiper-wrapper">
                        @foreach($articles as $article)
                        <div class="swiper-slide">
                            <a href="{{ route('show.post', $article->id) }}" class="img-bg d-flex align-items-end"
                               style="background-image: url({{ asset($article->image) }});">
                                <div class="img-bg-inner">
                                    <h2>{{ $article->title }}</h2>
                                    <p>{{ $article->subtitle }}</p>
                                </div>
                            </a>
                        </div>
                        @endforeach
                    </div>
                    <div class="custom-swiper-button-next">
                        <span class="bi-chevron-right"></span>
                    </div>
                    <div class="custom-swiper-button-prev">
                        <span class="bi-chevron-left"></span>
                    </div>

                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </div>
    </div>
</section>


