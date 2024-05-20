<div class="col-lg-3 col-md-4 col-12 mb-5">
    <div class="shop-sidebar">
        <!-- Single Widget -->
        <div class="single-widget p-3">
            <div class="search-bar mb-3">
                <h6 class="text-muted">Chat</h6>
                <hr>
            </div>

            @foreach ($allMessages as $conversation)
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
                                <div class="d-flex justify-content-between align-items-center mb-4">
                                    <strong class="m-0">{{ $message->sender->name }}</strong>
                                    <small>{{ $message->updated_at->diffForHumans() }}</small>
                                </div>
                            </a>
                        @else
                            {{-- Tampilkan detail penerima pesan hanya jika ada penerima --}}
                            @if ($message->receiver)
                                <a href="{{ route('inbox.show', $message->receiver->name) }}">
                                    <div class="d-flex justify-content-between align-items-center mb-4">
                                        <strong class="m-0">{{ $message->receiver->name }}</strong>

                                        <small>{{ $message->updated_at->diffForHumans() }}</small>
                                    </div>
                                </a>
                            @endif
                        @endif
                    @endif
                @endforeach
            @endforeach

            <a href="{{ route('inbox') }}" class="text-secondary">
                << All Chat</a>

        </div>
    </div>
</div>
