<section id="posts" class="posts">
    <div class="container" data-aos="fade-up">
        <div class="row g-5">
            <div class="col-lg-4">
                @foreach($articles as $article)
                    @if($loop->iteration <=1)
                    <div class="post-entry-1 lg">
                        <a href="single-post.html"><img src="assets/img/post-landscape-1.jpg" alt="" class="img-fluid"></a>
                        <div class="post-meta"><span class="date">Culture</span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
                        <h2><a href="single-post.html">{{ $article->title }}</a></h2>
                        <p class="mb-4 d-block">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Vero temporibus repudiandae, inventore pariatur numquam cumque possimus exercitationem? Nihil tempore odit ab minus eveniet praesentium, similique blanditiis molestiae ut saepe perspiciatis officia nemo, eos quae cumque. Accusamus fugiat architecto rerum animi atque eveniet, quo, praesentium dignissimos</p>

                        <div class="d-flex align-items-center author">
                            <div class="photo"><img src="assets/img/person-1.jpg" alt="" class="img-fluid"></div>
                            <div class="name">
                                <h3 class="m-0 p-0">Cameron Williamson</h3>
                            </div>
                        </div>
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
                            <a href="single-post.html"><img src="assets/img/post-landscape-2.jpg" alt="" class="img-fluid"></a>
                            <div class="post-meta"><span class="date">Sport</span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
                            <h2><a href="single-post.html">{{ $article->title }}</a></h2>
                        </div>
                            @endif
                        @endforeach
                    </div>
                    <div class="col-lg-4 border-start custom-border">
                        @foreach($articles as $article)
                            @if($loop->iteration > 4 && $loop->iteration <= 7)
                                <div class="post-entry-1">
                                    <a href="single-post.html"><img src="assets/img/post-landscape-2.jpg" alt="" class="img-fluid"></a>
                                    <div class="post-meta"><span class="date">Sport</span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
                                    <h2><a href="single-post.html">{{ $article->title }}</a></h2>
                                </div>
                            @endif
                        @endforeach
                    </div>

                    <!-- Trending Section -->
                    <div class="col-lg-4">

                        <div class="trending">
                            <h3>Trending</h3>
                            <ul class="trending-post">
                                @foreach($articles as $article)
                                    @if($loop->iteration > 7)
                                        <li>
                                            <a href="single-post.html">
                                                <span class="number">1</span>
                                                <h3>{{ $article->title }}</h3>
                                                @foreach($article->categories as $category)
                                                    @if($loop->last)
                                                        <span class="author">
                                                            {{ $category->name }}
                                                        </span>
                                                    @else
                                                        <span class="author">
                                                            {{ $category->name }},
                                                        </span>
                                                    @endif
                                                @endforeach
                                            </a>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>

                    </div> <!-- End Trending Section -->
                </div>
            </div>

        </div> <!-- End .row -->
    </div>
</section>
