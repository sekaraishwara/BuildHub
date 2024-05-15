@extends('auth.layouts.auth-master')
@section('contents')
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bread-inner">
                        <ul class="bread-list">
                            <li><a href="{{ url('/') }}">Home<i class="ti-arrow-right"></i></a></li>
                            <li class="active"><a href="{{ route('store.chat') }}">Chat</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="section-box mt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 mb-5">
                    <div class="content-single">
                        <div class="card">
                            <div class="card-header border-0">
                                <h5>Chat ({{ $count }})</h5>
                            </div>
                            <div class="card-body">
                                @foreach ($getConversation as $conversation)
                                    {{-- Inisialisasi variabel untuk menyimpan ID percakapan --}}
                                    @php
                                        $displayedConversations = [];
                                    @endphp

                                    @foreach ($conversation->messages as $message)
                                        {{-- Periksa jika percakapan sudah ditampilkan sebelumnya --}}
                                        @if (!in_array($message->conversation_id, $displayedConversations))
                                            @php
                                                $displayedConversations[] = $message->conversation_id;
                                            @endphp

                                            {{-- Tampilkan detail pesan hanya if Anda bukan pengirimnya --}}
                                            @if ($message->sender_id !== Auth::id())
                                                <a href="{{ route('inbox.show', $message->sender->name) }}">
                                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                                        <div class="col-4 d-flex align-items-center p-0">
                                                            <img src="{{ $message->sender->image }}" width="50px"
                                                                alt="">
                                                            <p class="ml-3 mb-0">{{ $message->sender->name }}</p>
                                                        </div>
                                                        <p>{{ $message->created_at->diffForHumans() }}</p>
                                                    </div>
                                                </a>
                                            @else
                                                {{-- Tampilkan detail penerima pesan hanya jika ada penerima --}}
                                                @if ($message->receiver)
                                                    <a href="{{ route('inbox.show', $message->receiver->name) }}">
                                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                                            <div class="col-4 d-flex align-items-center p-0">
                                                                <img src="{{ $message->receiver->image }}" width="50px"
                                                                    alt="">
                                                                <p class="ml-3 mb-0">{{ $message->receiver->name }}</p>
                                                            </div>
                                                            <p>{{ $message->created_at->diffForHumans() }}</p>
                                                        </div>
                                                    </a>
                                                @endif
                                            @endif
                                        @endif
                                    @endforeach
                                @endforeach
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="mt-120"></div>
@endsection
