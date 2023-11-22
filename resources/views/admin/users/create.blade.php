@extends('admin.layouts.app')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Create Post</h1>
                    </div>
                    <div class="col-sm-6">

                    </div>
                </div>
            </div>
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <form action="{{ route('admin.posts.store') }}" class="col-md-10 mb-5" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Header</label>
                            <input type="text" name="title"
                                   value="{{ old('title') }}"
                                   class="form-control
                                   @error('title') is-invalid @enderror"
                                   placeholder="Enter article title" required
                                   autofocus
                            >

                            @error('title')
                            <span class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Subtitle</label>
                            <input type="text" name="subtitle"
                                   value="{{ old('subtitle') }}"
                                   class="form-control
                                   @error('subtitle') is-invalid @enderror"
                                   placeholder="Enter article title"
                            >

                            @error('subtitle')
                            <span class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Category</label>
                            <select class="select2" name="categories[]" multiple="multiple" data-placeholder="Select a State" style="width: 100%;">
                                @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>

                            @error('categories')
                            <span class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Content(please set for image max width 730px)</label>
                            <textarea name="text"
                                      class="form-control tiny-editor @error('text') is-invalid @enderror"
                            >
                                {{ old('text') }}
                            </textarea>
                            @error('text')
                            <span class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="feature_image">Feature Image</label>
                            <input class="form-control col-md-6" type="text" id="feature_image" name="image" value="" readonly>
                            <img src="" alt="" class="img-uploaded img-thumbnail" width="150">
                            <a href="" class="popup_selector" data-inputid="feature_image">Select Image</a>

                            @error('subtitle')
                            <span class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" name="to_slider" class="custom-control-input mr-3" id="customSwitch1" value="1">
                                <label class="custom-control-label" for="customSwitch1">Show in main slider</label>
                            </div>


                            @error('subtitle')
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
    <script>
    $(function () {
        //Initialize Select2 Elements
        $('.select2').select2()
    });
    </script>
@endsection
