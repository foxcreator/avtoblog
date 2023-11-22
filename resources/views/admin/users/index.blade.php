@extends('admin.layouts.app')
@section('content')

    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">All Users</h1>
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
                                <th>Goggle id</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td class="align-middle">{{ $user->id }}</td>
                                <td class="align-middle">
                                    @if($user->avatar)
                                        <img class="img-thumbnail" style="width: 100px" src="{{ $user->avatar }}">
                                    @else
                                        <img class="img-thumbnail" style="width: 100px" src="{{ asset('assets/img/person-1.jpg') }}">
                                    @endif
                                </td>
                                <td class="align-middle">{{ $user->name }}</td>
                                <td class="align-middle">{{ \Carbon\Carbon::make($user->created_at)->format('d-m-Y') }}</td>
                                <td class="align-middle">
                                    @if($user->google_id)
                                        <i class="fas fa-check-square text-success"></i>
                                    @endif
                                </td>
                                <td class="align-middle">
                                    <a href="{{ route('admin.users.edit', $user->id) }}"><i class="fas fa-edit"></i></a>
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
