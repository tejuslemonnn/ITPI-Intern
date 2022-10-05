<?php

namespace App\Http\Controllers;

<<<<<<< Updated upstream
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
=======
use App\Models\message;
use App\Models\room;
use Illuminate\Http\Request;
use App\Events\messageSent;

class MessageController extends Controller
{
    public function getRooms(){
        return response()->json([
            'rooms' => room::all()
        ]);
    }

    public function roomMessage($id){
        $room = room::find($id); 
        return response()->json([
            'room' => $room,
            'messages' => $room->message
        ]);
    }

    public function addMessage(Request $request){
        $name = $request->get('name');
        $text = $request->get('text');
        $room_id = $request->get('room_id');
        
        try {
            $message = message::create([
                'name' => $name,
                'text' => $text,
                'room_id' => $room_id
            ]);


            event(new messageSent($message->room()->id, $message));

            return response()->json([
                'status' => 'success'
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'error'
            ]);
        }


>>>>>>> Stashed changes
    }
}
