<?php

namespace avaluestay\Http\Controllers;

use avaluestay\Contracts\MessageInterface;
use avaluestay\Events\Notification;
use avaluestay\Http\Requests;
use avaluestay\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MessagesController extends Controller
{
    private $messages;

    /**
     * MessagesController constructor.
     *
     * @param $messages
     */
    public function __construct(MessageInterface $messages)
    {
        $this->messages = $messages;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        // Get all messages for current user
        $messages = $this->messages
            ->whereReceiverId($request->user()->id)
            ->orderBy('created_at', 'desc')
            ->get();

        $messages = $messages->groupBy(function ($message) {
            return $message->sender_id;
        });

        return view('back.pages.messages.index', compact("messages"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int                     $id
     *
     * @return \avaluestay\Http\Controllers\Response
     */
    public function show(Request $request, $id)
    {
        $message = $this->messages->findOrFail($id);
        $messages = $this->messages->whereSenderId($message->sender_id)->get();

        if ($this->userCanReadMessage($request->user(), $messages->count())) {

            foreach ($messages as $text) {
                $this->changeMassageReadStatus($text);
            }
            $conversations = $this->getConversations($request, $message);

            return view('back.pages.messages.show', compact('conversations'));
        }

        return redirect()->route("user.subscription", ['redirect' => "messages"])->withMessage("you need to upgrade account or buy some credits in order to read messages!");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request $request
     * @param  int     $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

    private function userCanReadMessage(User $user, $numberOfUnreadMessages)
    {
        if ($user->type == "manager") {
            return true;
        } elseif ($user->type == "cuser") {
            if ($user->credit > 0 && $user->credit >= $numberOfUnreadMessages) {
                $user->credit = $user->credit - $numberOfUnreadMessages;
                $user->save();

                return true;
            }

            return false;
        } elseif ($user->type == "suser") {
            if ($user->expiry_date->gt(Carbon::now())) {
                return true;
            }

            return false;
        }

        return false;
    }

    /**
     * @param $message
     */
    private function changeMassageReadStatus($message)
    {
        if (!$message->read) {
            $message->read = 1;
            $message->save();
        }
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param                          $message
     */
    private function getConversations(Request $request, $message)
    {
        $receiveMessages = $this->messages
            ->whereReceiverId($request->user()->id)
            ->whereSenderId($message->sender_id)
            ->get();
        $sendMessages = $this->messages
            ->whereReceiverId($message->sender_id)
            ->whereSenderId($request->user()->id)
            ->get();
        $conversations = $receiveMessages->merge($sendMessages);
        $sortedConversations = $conversations->sort(function ($a, $b) {
            return $a->created_at->gt($b->created_at) ? 1 : -1;
        });

        return $sortedConversations;
    }

    public function sendMessage(Request $request, $senderId, $receiverId)
    {
        if ($request->ajax()) {
            $this->messages->message = $request->get('message');
            $this->messages->sender_id = $senderId;
            $this->messages->receiver_id = $receiverId;
            $this->messages->read = 0;
            $this->messages->save();

            event(new Notification($this->messages, "created"));

            return $this->messages;
        }
    }

    public function getMessages(Request $request, $senderId, $receiverId)
    {
        if ($request->ajax()) {
            $messages = $this->messages
                ->whereSenderId($senderId)
                ->whereReceiverId($receiverId)
                ->whereRead(0)
                ->get();
            foreach ($messages as $message) {
                $message->read = 1;
                $message->save();
            }

            return $messages;
        }
    }

    public function newsendMessage(Request $request, $receiverId)
    {
        if ($request->ajax() && $this->sendToAValidReceiver($request, $receiverId)) {
            $this->messages->sender_id = $request->user()->id;
            $this->messages->receiver_id = $receiverId;
            $this->messages->message = $request->get("message");
            $this->messages->read = 0;
            $this->messages->save();

            return ['response' => 'completed', "object" => $this->messages];
        }

        return ['response' => 'error', "errorMessage" => "send to invalid user"];

    }

    private function sendToAValidReceiver($request, $receiverId)
    {
        if ($request->user()->id == $receiverId) {
            return false;
        }

        return true;
    }
}
