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
                                <h4>On Going Transactions (Need Approve)</h4>

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
                                                <th>Status Approval</th>
                                                <th>Invoice No</th>
                                                <th>Transaction Date</th>
                                                <th>Order Type</th>
                                                {{-- <th>Is Active</th> --}}
                                                <th>Payment Status</th>
                                                <th>Paid At</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($dataService as $item)
                                                <tr role="row" class="odd">
                                                    <td class="sorting_1">
                                                        @if ($item->isApprove)
                                                            <span class="text-success">Approve by Admin</span>
                                                        @else
                                                            <span class="text-danger">Waiting for Approve</span>
                                                        @endif
                                                    </td>
                                                    <td class="sorting_1">{{ $item->invoice_no }}</td>
                                                    <td class="sorting_1">{{ $item->created_at->format('Y-m-d') }}</td>
                                                    <td class="sorting_1">{{ $item->orderType }}</td>
                                                    {{-- <td class="sorting_1">{{ $item->isActive ? 'Yes' : 'No' }}</td> --}}
                                                    <td class="sorting_1" width="5%">
                                                        {{ $item->isApprove ? 'Paid' : 'Pending' }}</td>
                                                    <td class="sorting_1">{{ $item->paid_at }}</td>
                                                    <form
                                                        action="{{ route('admin.transaction.approveTransaction', $item->invoice_no) }}"
                                                        method="post">
                                                        @csrf
                                                        @if ($item?->isPayment)
                                                            @if ($item?->isApprove)
                                                                <td><strong class="text-success">COMPLETE</strong></td>
                                                            @else
                                                                <td> <button class="btn btn-sm btn-success">Approved
                                                                    </button></td>
                                                            @endif
                                                        @else
                                                            <td> <button class="btn btn-sm btn-secondary disabled">Approved
                                                            </td>
                                                            </button>
                                                        @endif
                                                    </form>
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
