@extends('admin.layouts.app')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Edit user #{{ $user->id }} ({{ $user->name }})</h1>
                    </div>
                    <div class="col-sm-6">

                    </div>
                </div>
            </div>
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <form action="{{ route('admin.users.update', $user->id) }}" class="col-md-10 mb-5" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name"
                                   value="{{ old('name', $user->name) }}"
                                   class="form-control
                                   @error('name') is-invalid @enderror"
                                   readonly
                            >

                            @error('title')
                            <span class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" name="email"
                                   value="{{ old('email', $user->email) }}"
                                   class="form-control
                                   @error('email') is-invalid @enderror"
                                   readonly
                            >

                            @error('email')
                            <span class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Nickname</label>
                            <input type="text" name="nickname"
                                   value="{{ old('nickname', $user->nickname) }}"
                                   class="form-control
                                   @error('nickname') is-invalid @enderror"
                                   readonly
                            >

                            @error('nickname')
                            <span class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group pb-5">
                            <label>User role</label>
                            <select name="role" class="form-control select2bs4">
                                @unless($user->roles->count())
                                    <option value="-----">-----</option>
                                @endunless
                                @foreach($roles as $role)
                                    <option value="{{ $role->name }}" @if($user->hasRole($role->name)) selected @endif>{{ $role->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <a href="{{ route('admin.posts.index') }}" class="btn bt-sm btn-outline-dark">Back</a>
                        <button type="submit" class="btn bt-sm btn-outline-success">Save</button>

                    </form>
                </div>
            </div>
        </section>
    </div>
    <script>
    $(function () {
        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })
    });
    </script>
@endsection
