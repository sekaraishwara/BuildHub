@extends('admin.layouts.master')
@section('contents')
    <div class="content">
        <!-- Animated -->
        <div class="animated fadeIn">
            <!-- Widgets  -->
            <div class="row">
                <div class="col-lg-12">
                    <form action="{{ route('admin.data.blog.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex justify-content-between">
                                    <h4>Create an Article </h4>
                                    <button type="submit" class="btn btn-sm btn-success text-white">Publish to
                                        Blog</button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-12 mb-4">
                                        <label for="">Article title</label>
                                        <input type="text" class="form-control" name="title"
                                            placeholder="Article title...">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 mb-4">
                                        <label for="">Thumbnail</label>
                                        <input type="file" class="form-control" name="image">
                                    </div>
                                    <div class="col-lg-6 mb-4">
                                        <label for="">Article Tag</label>
                                        <input type="text" class="form-control" name="blog_category"
                                            value="Article tag...">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 mb-4">
                                        <label for="">Content</label>
                                        <input id="content" type="hidden" name="content">
                                        <trix-editor input="content" class="trix-content" id="content"></trix-editor>

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
