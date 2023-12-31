@extends('admin.layouts.app')
@section('content')

    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">All Categories</h1>
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
                                <th>Name</th>
                                <th>Date</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $category)
                            <tr>
                                <td class="align-middle">{{ $category->id }}</td>
                                <td class="align-middle">
                                    <img class="img-thumbnail" style="width: 100px" src="{{ asset($category->image) }}">
                                </td>
                                <td class="align-middle">{{ $category->name }}</td>
                                <td class="align-middle">{{ \Carbon\Carbon::make($category->created_at)->format('d-m-Y') }}</td>
                                <td class="align-middle">
                                    <a href="{{ route('admin.categories.edit', $category->id) }}"><i class="fas fa-edit"></i></a>
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
