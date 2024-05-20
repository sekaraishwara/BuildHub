@extends('admin.layouts.master')
@section('contents')
    <div class="content">
        <!-- Animated -->
        <div class="animated fadeIn">
            <!-- Widgets  -->
            <div class="row">
                <div class="col-lg-12">
                    <form action="{{ route('admin.data.event.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex justify-content-between">
                                    <h4>Create an Event </h4>
                                    <button type="submit" class="btn btn-sm btn-success text-white">Publish to
                                        BuildHub Site</button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-12 mb-4">
                                        <label for="">Event title</label>
                                        <input type="text" class="form-control" name="title"
                                            placeholder="Event title...">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 mb-4">
                                        <label for="">Thumbnail</label>
                                        <input type="file" class="form-control" name="image">
                                    </div>
                                    <div class="col-lg-6 mb-4">
                                        <label for="">Event Tag</label>
                                        <input type="text" class="form-control" name="event_category"
                                            placeholder="Event tag...">
                                    </div>
                                    <div class="col-lg-6 mb-4">
                                        <label for="">Event By</label>
                                        <input type="text" class="form-control" name="event_by"
                                            placeholder="Event by...">
                                    </div>
                                    <div class="col-lg-6 mb-4">
                                        <label for="">Event Date</label>
                                        <input type="date" class="form-control" name="date">
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
