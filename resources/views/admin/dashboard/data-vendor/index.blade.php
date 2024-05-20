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
                                <h4>All Vendor Account</h4>

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
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Join Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($vendors as $item)
                                                <tr role="row" class="odd">
                                                    <td class="sorting_1">{{ $item->name }}</td>
                                                    <td class="sorting_1">{{ $item->email }}</td>
                                                    <td class="sorting_1">{{ $item->phone }}</td>
                                                    <td>{{ $item->created_at->format('d-M-Y') }}</td>
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



    <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('admin.data-category.store.update') }}" method="POST">
                    <div class="modal-body">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="company" class=" form-control-label">Category
                                        Name</label>
                                    <input type="text" id="name" name="name" placeholder="Enter category name"
                                        class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
