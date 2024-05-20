@extends('admin.layouts.master')
@section('contents')
    <div class="content">
        <!-- Animated -->
        <div class="animated fadeIn">
            <!-- Widgets  -->
            <div class="row">
                <div class="col-lg-12 col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between">
                                <h4>All Article </h4>
                                {{-- <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#createModal">Post an
                                    Article</button> --}}
                                <a href="{{ route('admin.data.blog.create') }}" class="btn btn-sm btn-primary text-white">Post
                                    an
                                    Article</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="bootstrap-data-table"
                                        class="table table-striped table-bordered dataTable no-footer" role="grid"
                                        aria-describedby="bootstrap-data-table_info">
                                        <thead>
                                            <tr role="row">
                                                <th>Article Name</th>
                                                <th>Article Tag</th>
                                                <th>Created_at</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($article as $item)
                                                <tr role="row" class="odd">
                                                    <td class="sorting_1">{{ $item->title }}</td>
                                                    <td class="sorting_1">{{ $item->blog_category }}</td>
                                                    <td class="sorting_1">{{ $item->publish_date }}</td>
                                                    <td> <a href="{{ route('admin.data.blog.edit', $item->slug) }}"
                                                            class="btn btn-sm btn-warning">Edit</a>
                                                        <a href="{{ route('admin.data.blog.delete', $item->id) }}"
                                                            class="btn btn-danger btn-sm delete-item">Delete</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
