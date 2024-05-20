@extends('auth.layouts.auth-master')
@section('contents')
    <div class="breadcrumbs mb-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bread-inner">
                        <ul class="bread-list">
                            <li><a href="{{ route('home') }}">Home </a><i class="ti-arrow-right"></i></li>
                            <li><a href="{{ route('customer.dashboard') }}">Dashboard </a><i class="ti-arrow-right"></i></li>
                            <li class="active"><a href="{{ route('customer.profile') }}">Building Checklist</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="section-box mt-5">
        <div class="container">
            <div class="row">
                @include('frontend._customer-dashboard.sidebar')
                <div class="col-lg-9 col-md-8 mb-5">
                    <div class="content-single">
                        <div class="card">
                            <div class="card-header bg-white">
                                <h5><i class="ti-list mr-3"></i>Building Checklist</h5>
                            </div>
                            <form action="{{ route('customer.building-checklist.create') }}" method="POST">
                                @csrf
                                <div class="card-body">
                                    <div class="col-12">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="d-flex align-items-center">
                                                <i class="ti-user mr-1 icon-user"></i>
                                                <div class="col-12">
                                                    <h6>{{ auth()->user()->name }}</h6> Properties
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <i class="ti-home mr-1 icon-user"></i>
                                                <div class="col-12">
                                                    <input type="text" name="title"
                                                        placeholder="Create for new project...">
                                                    <button type="submit" class="btn-sm btn-primary">Save</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="content-single mt-3">
                        <div class="accordion" id="checklistAccordion">
                            @foreach ($data as $checklist)
                                <div class="card">
                                    <div class="card-header bg-white" id="heading{{ $checklist->id }}">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                                data-target="#collapse{{ $checklist->id }}" aria-expanded="false"
                                                aria-controls="collapse{{ $checklist->id }}">
                                                {{ $checklist->title }}
                                            </button>

                                            @if ($checklist->isComplete)
                                                <span class="badge badge-secondary p-2">Completed</span>
                                            @else
                                                <div class="d-flex justify-content-start">
                                                    @if (!$checklist->isActive)
                                                        <form
                                                            action="{{ route('customer.building-checklist.unpin', $checklist->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            <button type="submit"
                                                                class="btn btn-link p-1 mx-3">Unpin</button>
                                                        </form>
                                                    @else
                                                        <form
                                                            action="{{ route('customer.building-checklist.pin', $checklist->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            <button type="submit" class="btn btn-link p-1 mx-2">Pin
                                                                Project</button>
                                                        </form>
                                                    @endif
                                                    <form
                                                        action="{{ route('customer.building-checklist.complete', $checklist->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        <button class="btn btn-link p-1 text-white">Mark as
                                                            Complete</button>
                                                    </form>
                                                    <a href="{{ route('customer.building-checklist.delete', $checklist->id) }}"
                                                        class="btn btn-link p-1 text-white mx-2 delete-item"><i
                                                            class="ti-trash"></i></a>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div id="collapse{{ $checklist->id }}"
                                        class="collapse @if (!$checklist->isActive && !$checklist->isComplete) show @endif"
                                        aria-labelledby="heading{{ $checklist->id }}" data-parent="#checklistAccordion">
                                        <div class="card-body">
                                            @foreach ($checklist->items as $item)
                                                <div
                                                    class="d-flex justify-content-between align-items-center my-3 @if ($item->isComplete) completed @endif">
                                                    <input type="text" class="form-control" name="list[]"
                                                        value="{{ $item->list }}" placeholder="My item here..."
                                                        @if ($checklist->isComplete) disabled @endif>
                                                    <input type="text" class="form-control mx-3" name="notes[]"
                                                        value="{{ $item->notes }}" placeholder="Notes..."
                                                        @if ($checklist->isComplete) disabled @endif>
                                                    @if (!$checklist->isComplete)
                                                        <a href="{{ route('customer.building-checklist.items-delete', $item->id) }}"
                                                            type="button" class="btn-sm btn-danger delete-item"><i
                                                                class="ti-trash"></i></a>
                                                        <form method="POST"
                                                            action="{{ route('customer.building-checklist.items-done', ['id' => $item->id]) }}">
                                                            @csrf
                                                            <button type="submit" class="btn-sm btn-success mx-2"><i
                                                                    class="ti-check"></i></button>
                                                        </form>
                                                    @endif
                                                </div>
                                            @endforeach
                                            <hr>
                                            @if (!$checklist->isComplete)
                                                <form action="{{ route('customer.building-checklist.items-store') }}"
                                                    method="POST">
                                                    @csrf
                                                    <input type="hidden" name="checklist_id" value="{{ $checklist->id }}">
                                                    <div class="d-flex align-items-center my-4">
                                                        <input type="text" name="list" class="form-control"
                                                            id="itemInput" placeholder="Add item here...">
                                                        <input type="text" name="notes" class="form-control mx-3"
                                                            id="notesInput" placeholder="Notes...">
                                                        <button type="submit" class="btn">Add</button>
                                                    </div>
                                                </form>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="mt-120"></div>
@endsection

<style>
    .icon-user {
        font-size: 30px;
    }

    .completed input[type="text"] {
        text-decoration: line-through;
        background-color: #d0d0d0;
    }
</style>
