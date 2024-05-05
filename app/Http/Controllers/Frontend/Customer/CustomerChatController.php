<?php

namespace App\Http\Controllers\Frontend\Customer;

use App\Models\Store;
use App\Models\Messages;
use Illuminate\View\View;
use App\Models\Conversation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CustomerChatController extends Controller
{
    public function index(): View
    {
        return view('frontend._customer-dashboard._chat');
    }

    public function sendMessage(Request $request)
    {

        if ($request->isMethod('get')) {
            if ($request->has('store_id')) {
                $storeId = $request->query('store_id');
                $store = Store::find($storeId);

                if ($store) {
                    session([
                        'store_id' => $storeId,
                        'storeOwner_id' => $store->user_id,
                        'store_name' => $store->name,
                        'store_logo' => $store->logo,
                    ]);

                    $senderId = auth()->id();
                    $receiverId = session('storeOwner_id');

                    $conversation = Conversation::where(function ($query) use ($senderId, $receiverId) {
                        $query->where('user1_id', $senderId)->where('user2_id', $receiverId);
                    })->orWhere(function ($query) use ($senderId, $receiverId) {
                        $query->where('user1_id', $receiverId)->where('user2_id', $senderId);
                    })->first();

                    $messages = [];
                    if ($conversation) {
                        $messages = $conversation->messages()->get();
                    }
                    // dd($messages);

                    return view('frontend._customer-dashboard._chat-sendMessage', compact('conversation', 'messages'));
                }
            }
        }

        $senderId = auth()->id();
        $receiverId = session('storeOwner_id');

        if ($request->isMethod('post')) {

            $conversation = Conversation::where(function ($query) use ($senderId, $receiverId) {
                $query->where('user1_id', $senderId)->where('user2_id', $receiverId);
            })->orWhere(function ($query) use ($senderId, $receiverId) {
                $query->where('user1_id', $receiverId)->where('user2_id', $senderId);
            })->first();

            if (!$conversation) {
                $conversation = Conversation::create([
                    'user1_id' => $senderId,
                    'user2_id' => $receiverId,
                ]);
            }

            $message = new Messages();
            $message->conversation_id = $conversation->id;
            $message->sender_id = $senderId;
            $message->receiver_id = $receiverId;
            $message->message = $request->input('message');
            $message->save();

            // $conversation->last_active_at = Carbon::now();
            $conversation->save();


            notify()->success('Sending chat successfully ⚡️.', 'Success!');

            return redirect()->back();
        }
    }
}
