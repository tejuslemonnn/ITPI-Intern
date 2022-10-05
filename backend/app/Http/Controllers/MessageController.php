<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Events\MessageSent;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class MessageController extends Controller
{
    public function getAllRooms()
    {
        $rooms = Room::all();
        return response()->json([
            'rooms' => $rooms
        ]);
    }

    public function joinRoom($room_id)
    {
        $room = Message::find($room_id);
        $messages = Message::where('room_id', $room_id)->get();

        return response()->json([
            'room' => $room,
            'messages' => $messages
        ]);
    }

    public function sendMessage(Request $request, Message $room)
    {
        $name = $request->get('name');
        $room = $request->get('room_id');
        $message = $request->get('message');

        $message = Message::create([
            'name' => $name,
            'room_id' => $room,
            'message' => $message
        ]);

        event(new MessageSent($room, $message));
        return response()->json([
            'message' => $message
        ], 200);
    }
}
