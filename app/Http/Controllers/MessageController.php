<?php

namespace App\Http\Controllers;

use App\Http\Requests\MessageFormRequest;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function getView() {
        return view('contact');
    }

    public function messages() {

        $messages = Message::all();

        return view('admin.messages.index', compact('messages'));

    }

    public function deleteMessage($id) {
        $message = Message::find($id);

        $message->delete();

        return redirect('messages');
    }

    public function createMessage(MessageFormRequest $request) {
        $message = new Message();

        $message->name = $request->input('nombre');

        $message->email = $request->input('email');

        $message->message = $request->input('mensaje');

        $message->save();

        $request->session()->flash('correcto', 'Se ha mandado el mensaje');

        return redirect('contact');
    }
}
