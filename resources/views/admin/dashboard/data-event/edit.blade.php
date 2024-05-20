@extends('admin.layouts.master')
@section('contents')
    <div class="content">
        <!-- Animated -->
        <div class="animated fadeIn">
            <!-- Widgets  -->
            <div class="row">
                <div class="col-lg-12">
                    <form action="{{ route('admin.data.event.update', $event?->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex justify-content-between">
                                    <h4>Edit an Event </h4>
                                    <button type="submit" class="btn btn-sm btn-success text-white">Update Event</button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-12 mb-4">
                                        <label for="">Event title</label>
                                        <input type="text" class="form-control" name="title"
                                            placeholder="Event title..." value="{{ $event?->title }}">
                                    </div>
                                </div>

                                <div class="row align-items-center">
                                    <div class="col-lg-6 mb-4">
                                        <x-image-preview :height="300" :width="350" :source="$event?->image" />
                                    </div>
                                    <div class="col-lg-6 mb-4">
                                        <div class="form-group">
                                            <label for="Name">Event Image</label>
                                            <small class="text-danger">*Tidak lebih dari 1500Kb</small>
                                            <input class="form-control" type="file" name="image" id="image">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6 mb-4">
                                        <label for="">Event Tag</label>
                                        <input type="text" class="form-control" name="event_category"
                                            placeholder="Article category..." value="{{ $event?->event_category }}">
                                    </div>
                                    <div class="col-lg-6 mb-4">
                                        <label for="">Event Date</label>
                                        <input type="date" class="form-control" name="date" placeholder="Event by..."
                                            value="{{ $event?->date }}">
                                    </div>
                                    <div class="col-lg-12 mb-4">
                                        <label for="">Event By</label>
                                        <input type="text" class="form-control" name="event_by" placeholder="Event by..."
                                            value="{{ $event?->event_by }}">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12 mb-4">
                                        <label for="content">Content</label>
                                        <input id="content" type="hidden" name="content" value="{{ $event?->content }}">
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
