@extends('front.layouts.app')
@section('title', $article->title)
@section('description', $article->subtitle)
@section('content')
    <section class="single-post-content">
        <div class="container">
            <div class="row">
                <div class="col-md-9 post-content" data-aos="fade-up">

                    <!-- ======= Single Post Content ======= -->
                    <div class="single-post mr-3 overflow-hidden">
                        <div class="post-meta">
                            @foreach($article->categories as $category)
                                <span class="date">
                                    {{ $category->name }}
                                </span>
                                <span class="mx-1">&bullet;</span>
                            @endforeach
                            <span>{{ \Carbon\Carbon::make($article->created_at)->format('d.m.Y') }}</span>
                        </div>
                        <h1 class="mb-5">{{ $article->title }}</h1>
                        <img src="{{ asset($article->image) }}" style="width: 100%" alt="{{ $article->title }}" class="image mb-5">

                        {!! $article->text !!}
                    </div>

                    <div class="comments">
                        @if($article->comments)
                            <h5 class="comment-title py-4">{{ $article->comments->count() }} Коментарів</h5>
                            @foreach($article->comments()->orderBy('created_at', 'desc')->paginate(50) as $comment)
                                <div class="comment d-flex mb-4">
                                    <div class="flex-shrink-0">
                                        <div class="avatar avatar-sm rounded-circle">
                                            @if($comment->user->avatar)
                                                <img class="avatar-img img-fluid" src="https://lh3.googleusercontent.com/a/ACg8ocILXzf3qACDVANMcZgZ6JAy9nE_1OrfYjvfZeJhcgLc=s96-c" alt="">
                                            @else
                                                <img class="avatar-img img-fluid" src="{{ asset('assets/img/user-image.png') }}" alt="{{ $comment->user->name }}">
                                            @endif
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 ms-2 ms-sm-3">
                                        <div class="comment-meta d-flex align-items-baseline">
                                            <h6 class="me-2">{{ $comment->user->name }}</h6>
                                            <span
                                                class="text-muted">{{ \Carbon\Carbon::parse($comment->created_at)->diffForHumans() }}</span>
                                        </div>
                                        <div class="comment-body">
                                            {{ $comment->content }}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            {{ $article->comments()->paginate(50)->links() }}
                        @endif
                    </div>
                    @auth()
                    <div class="row justify-content-center mt-5">
                        <div class="col-lg-12">
                            <h5 class="comment-title">Залишити коментар</h5>
                            <form action="{{ route('comment.store') }}" class="row" method="POST">
                                @csrf
                                <div class="col-12 mb-3">
                                    <input type="hidden" name="user_id"
                                           value="{{ auth()->user()->getAuthIdentifier() }}">
                                    <input type="hidden" name="article_id" value="{{ $article->id }}">
                                    <textarea class="form-control" name="content" id="comment-message"
                                              placeholder="Залиште свій коментар" cols="20" rows="5"></textarea>
                                </div>
                                <div class="col-12">
                                    <input type="submit" class="btn btn-primary" value="Відправити">
                                </div>
                            </form>
                        </div>
                    </div>
                    @endauth
                    @guest()
                        <div class="row justify-content-center mt-5">
                            <div class="col-lg-12">
                                <h5 class="comment-title">Зарєєструйтесь або війдіть щоб мати можливість залишити коментарій</h5>
                            </div>
                        </div>
                    @endguest
                </div>
                @include('front.layouts.aside-block')

            </div>
        </div>
    </section>
@endsection
