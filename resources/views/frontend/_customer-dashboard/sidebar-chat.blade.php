<div class="col-lg-3 col-md-4 col-12 mb-5">
    <div class="shop-sidebar">
        <!-- Single Widget -->
        <div class="single-widget p-3">
            <div class="search-bar mb-4">
                <form>
                    <input name="search" placeholder="Search Chat....." type="search">
                    <button class=" btn-sm"><i class="ti-search"></i></button>
                </form>
            </div>

            @foreach ($allMessages as $item)
                <div class="d-flex justify-content-between align-items-center">
                    <img src="{{ $sender->logo }}" width="60px" alt="">
                    <div class="row ml-2">
                        <p class="text-muted">{{ $sender->name }}</p>
                        <small class="mb-0 " style="line-height: 1.3;">Lorem ipsum Lorem consectetur..</small>
                    </div>
                </div>
                <hr>
            @endforeach

            <a href="{{ route('inbox') }}" class="text-secondary">
                << All Chat</a>

        </div>
    </div>
</div>
