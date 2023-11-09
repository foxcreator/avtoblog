@extends('admin.layouts.app')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Create Category</h1>
                    </div>
                    <div class="col-sm-6">

                    </div>
                </div>
            </div>
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <form action="{{ route('admin.categories.store') }}" class="col-md-6" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Category name</label>
                            <input type="text" name="name"
                                   value="{{ old('name') }}"
                                   class="form-control
                                   @error('name') is-invalid @enderror"
                                   placeholder="Category name" required
                                   autofocus
                            >

                            @error('name')
                            <span class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn bt-sm btn-outline-success">Create</button>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection
