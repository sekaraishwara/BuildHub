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

        $getConversation = Conversation::with('sender', 'receiver')
            ->where(function ($query) use ($user) {
                $query->where('user1_id', $user->id)
                    ->orWhere('user2_id', $user->id);
            })
            ->get() // Kelompokkan data berdasarkan pasangan user1_id dan user2_id
        ;

        $count = Conversation::with('sender', 'receiver')
            ->where(function ($query) use ($user) {
                $query->where('user1_id', $user->id)
                    ->orWhere('user2_id', $user->id);
            })->count();

        // $senderNames = [];
        // $senderImgs = [];

        // foreach ($getConversation as $conversation) {
        //     foreach ($conversation->messages as $message) {
        //         if ($message->sender_id !== $user->id) {
        //             $senderNames[] = $message->sender->name;
        //             $senderImgs[] = $message->sender->image;
        //         }
        //     }
        // }

        // $senderName = array_unique($senderNames);
        // $senderImg = array_unique($senderImgs);

        // dd($senderName);

        return view('frontend.defaults._display-all-chat', compact('getConversation', 'count'));
    }


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

        $allMessages = Conversation::with(['sender', 'receiver'])
            ->where('user1_id', $user->id)
            ->orWhere('user2_id', $user->id)
            ->get();



        return view('frontend.defaults._chat', compact('messages', 'sender', 'allMessages'));

        // $user = Auth::user();
        // $sender = User::where('name', $senderName)->first();

        // $conversation = Conversation::where(function ($query) use ($user, $sender) {
        //     $query->where('user1_id', $user->id)
        //         ->where('user2_id', $sender->id);
        // })->orWhere(function ($query) use ($user, $sender) {
        //     $query->where('user1_id', $sender->id)
        //         ->where('user2_id', $user->id);
        // })->first();

        // // if theres no conversation
        // if (!$conversation) {
        //     return view('frontend.defaults._empty-chat', compact('sender'));
        // }

        // // if theres a conversation
        // $messages = Messages::with('sender')
        //     ->where(function ($query) use ($user, $sender) {
        //         $query->where('receiver_id', $user->id)
        //             ->where('sender_id', $sender->id);
        //     })
        //     ->orWhere(function ($query) use ($user, $sender) {
        //         $query->where('receiver_id', $sender->id)
        //             ->where('sender_id', $user->id);
        //     })
        //     ->orderBy('created_at')
        //     ->get();

        // // dd($messages);

        // if (!$messages) {
        //     abort(404);
        // }

        return view('frontend.defaults._chat', compact('messages', 'sender'));
    }

    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'message' => 'required|string',
    //         'receiver_id' => 'required',
    //     ]);

    //     $user = Auth::user();
    //     $receiver = User::where('id', $request->receiver_id)->first();


    //     $conversation = Conversation::updateOrCreate(
    //         [
    //             'user1_id' => $receiver->id,
    //             'user2_id' => $user->id,
    //         ],
    //     );





    //     $message = new Messages();
    //     $message->message = $request->message;
    //     $message->sender_id = $user->id;
    //     $message->receiver_id = $receiver->id;
    //     $message->conversation_id = $conversation->id;



    //     $message->save();

    //     // Redirect atau response sesuai kebutuhan Anda
    //     return redirect()->back()->with('success', 'Pesan berhasil dikirim');
    // }

    public function store(Request $request)
    {
        $request->validate([
            'message' => 'required|string',
            'receiver_id' => 'required',
        ]);

        $user = Auth::user();
        $receiver = User::findOrFail($request->receiver_id);

        // Cari atau buat percakapan berdasarkan id pengguna
        $conversation = Conversation::where(function ($query) use ($user, $receiver) {
            $query->where('user1_id', $user->id)
                ->where('user2_id', $receiver->id);
        })->orWhere(function ($query) use ($user, $receiver) {
            $query->where('user1_id', $receiver->id)
                ->where('user2_id', $user->id);
        })->first();

        // Jika percakapan belum ada, buat baru
        if (!$conversation) {
            $conversation = Conversation::create([
                'user1_id' => $user->id,
                'user2_id' => $receiver->id,
            ]);
        }

        // Simpan pesan
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
