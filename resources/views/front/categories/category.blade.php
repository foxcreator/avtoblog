@extends('front.layouts.app')
@section('title', "Категорія {$category->name}" )
@section('description', $category->description)
@section('content')

    <section>
        <div class="container">
            <div class="row">

                <div class="col-md-9" data-aos="fade-up">
                    <h3 class="category-title">Категорія: {{ $category->name }}</h3>
                    @foreach($articles as $article)
                        <div class="d-md-flex post-entry-2 half">
                        <a href="{{ route('show.article', $article->id) }}" class="me-4 thumbnail">
                            <img src="{{ asset($article->image) }}" alt="" class="img-fluid">
                        </a>
                        <div>
                            <div class="post-meta"><span class="date">{{ $category->name }}</span> <span class="mx-1">&bullet;</span> <span>{{ \Carbon\Carbon::make($article->created_at)->translatedFormat('d F Y') }}</span></div>
                            <h3><a href="{{ route('show.article', $article->id) }}">{{ $article->title }}</a></h3>
                            <p>{{ $article->subtitle }}</p>

                        </div>
                    </div>
                    @endforeach
                    {{ $articles->links() }}
                </div>
                @include('front.layouts.aside-block')
            </div>
        </div>
    </section>
@endsection
