@extends('admin.layouts.master')
@section('contents')
    <div class="content">
        <!-- Animated -->
        <div class="animated fadeIn">
            <!-- Widgets  -->
            <div class="row">
                <div class="col-lg-12">
                    <form action="{{ route('admin.data.blog.update', $article?->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex justify-content-between">
                                    <h4>Edit an Article </h4>
                                    <button type="submit" class="btn btn-sm btn-success text-white">Update Article</button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-12 mb-4">
                                        <label for="">Article title</label>
                                        <input type="text" class="form-control" name="title"
                                            placeholder="Article title..." value="{{ $article?->title }}">
                                    </div>
                                </div>

                                <div class="row align-items-center">
                                    <div class="col-lg-6 mb-4">
                                        <x-image-preview :height="300" :width="350" :source="$article?->image" />
                                    </div>
                                    <div class="col-lg-6 mb-4">
                                        <div class="form-group">
                                            <label for="Name">Product Image</label>
                                            <small class="text-danger">*Tidak lebih dari 1500Kb</small>
                                            <input class="form-control" type="file" name="image" id="image">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6 mb-4">
                                        <label for="">Article Tag</label>
                                        <input type="text" class="form-control" name="blog_category"
                                            placeholder="Article category..." value="{{ $article?->blog_category }}">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12 mb-4">
                                        <label for="content">Content</label>
                                        <input id="content" type="hidden" name="content"
                                            value="{{ $article?->content }}">
                                        <trix-editor input="content"></trix-editor>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
