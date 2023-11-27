@extends('front.layouts.app')
@section('content')
<section id="posts" class="posts">
    <div class="container" data-aos="fade-up">
        <div class="row g-5">
            <div class="col-lg-9">
                <div class="row g-5">
                    @foreach($categories as $category)
                    <div class="col-lg-4 border-start custom-border">
                                <div class="post-entry-1">
                                    <a href="{{ route('category.post', $category->id) }}"><img src="{{ asset($category->image) }}" alt="{{ $category->name }}" class="img-fluid"></a>
                                    <h2><a href="{{ route('category.post', $category->id) }}">{{ $category->name }}</a></h2>
                                </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @include('front.layouts.aside-block')

        </div> <!-- End .row -->
    </div>
</section>
@endsection
