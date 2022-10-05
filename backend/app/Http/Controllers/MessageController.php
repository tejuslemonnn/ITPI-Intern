<?php

namespace App\Http\Controllers;

use App\Events\MessageSend;
use App\Models\Message;
use App\Models\RoomMessage;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class MessageController extends Controller
{
    public function getAllRooms()
    {
        $rooms = RoomMessage::all();
        return response()->json([
            'rooms' => $rooms
        ]);
    }

    public function joinRoom($room_id)
    {
        $room = RoomMessage::find($room_id);
        $messages = Message::where('room_id', $room_id)->get();

        return response()->json([
            'room' => $room,
            'messages' => $messages
        ]);
    }

    public function sendMessage(Request $request, RoomMessage $room)
    {
        $name = $request->get('name');
        $room = $request->get('room_id');
        $message = $request->get('message');

        $message = Message::create([
            'name' => $name,
            'room_id' => $room,
            'message' => $message
        ]);

        event(new MessageSend($room, $message));
        return response()->json([
            'message' => $message
        ], 200);
    }
}
