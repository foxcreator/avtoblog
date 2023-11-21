@extends('front.layouts.app')
@section('title', 'Головна')
@section('description', 'Оновлення в автоіндустрії та власноручна майстерність на кожному кроці.')
@section('content')
    @include('front.main-page.slider')
    @include('front.main-page.posts-grid')

    @include('front.main-page.categories')
@endsection
