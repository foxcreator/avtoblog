@extends('admin.layouts.app')
@section('content')

    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">All Posts</h1>
                    </div>
                    <div class="col-sm-6">

                    </div>
                </div>
            </div>
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Date</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($posts as $post)
                            <tr>
                                <td class="align-middle">{{ $post->id }}</td>
                                <td class="align-middle"><img class="img-thumbnail" style="width: 100px" src="{{ asset('assets/img/2022_lexus_ls-500.jpeg') }}"></td>
                                <td class="align-middle">{{ $post->title }}</td>
                                <td class="align-middle">{{ \Carbon\Carbon::make($post->created_at)->format('d-m-Y') }}</td>
                                <td class="align-middle">
                                    <a href="">1</a>
                                    <a href="">2</a>
                                    <a href="">3</a>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
