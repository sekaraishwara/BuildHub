<?php

namespace App\Http\Controllers\Frontend\Home;

use App\Models\Conversation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Messages;
use GuzzleHttp\Psr7\Message;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;

class MessagesController extends Controller
{

    /**
     * Store a newly created resource in storage.
     */
    public function index(Request $request)
    {

        $user = Auth::user();

        $getConversation = Conversation::with('sender')
            ->where('user2_id', $user->id)
            ->get();


        $senderItem = $getConversation->map(function ($conversation) {
            $sender = $conversation->sender;

            if ($sender) {
                return [
                    'id' => $sender->id,
                    'image' => $sender->avatar ?? asset('default-uploads/avatar.jpg'),
                    'name' => $sender->name,
                    'email' => $sender->email,
                ];
            }
            return null;
        })->filter();

        return view('frontend.defaults._display-all-chat', compact('getConversation', 'senderItem'));
    }

    /**
     * Display the specified resource.
     */
    public function show($senderName)
    {

        $user = Auth::user();
        $sender = User::where('name', $senderName)->first();

        $messages = Messages::with('sender')
            ->where(function ($query) use ($user, $sender) {
                $query->where('receiver_id', $user->id)
                    ->where('sender_id', $sender->id);
            })
            ->orWhere(function ($query) use ($user, $sender) {
                $query->where('receiver_id', $sender->id)
                    ->where('sender_id', $user->id);
            })
            ->orderBy('created_at')
            ->get();

        // dd($messages);

        if (!$messages) {
            abort(404);
        }

        return view('frontend.defaults._chat', compact('messages', 'sender'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'message' => 'required|string',
            'receiver_id' => 'required',
        ]);

        $user = Auth::user();
        $receiver = User::where('id', $request->receiver_id)->first();


        $conversation = Conversation::updateOrCreate(
            [
                'user1_id' => $receiver->id,
                'user2_id' => $user->id,
            ],
        );





        $message = new Messages();
        $message->message = $request->message;
        $message->sender_id = $user->id;
        $message->receiver_id = $receiver->id;
        $message->conversation_id = $conversation->id;



        $message->save();

        // Redirect atau response sesuai kebutuhan Anda
        return redirect()->back()->with('success', 'Pesan berhasil dikirim');
    }
}