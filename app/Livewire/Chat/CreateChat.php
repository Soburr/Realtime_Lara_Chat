<?php

namespace App\Livewire\Chat;

use App\Models\Conversation;
use App\Models\Message;
use App\Models\User;
use Livewire\Component;

class CreateChat extends Component
{
    public $users;
    public $message = 'Hello, How are You?';

    public function checkconversation($receiverId) {

        //  dd($receiverId);

         $checkedConversation = Conversation::where('receiver_id', auth()->user()->id)
                               ->where('sender_id', $receiverId)->orWhere('receiver_id', $receiverId)
                               ->where('sender_id', auth()->user()->id)->get();

        if (count($checkedConversation)==0) {
            //  dd('NO Conversation');

             $createdConversation = Conversation::create(['receiver_id'=>$receiverId, 'sender_id' => auth()->user()->id, 'last_time_message'=>0]);
             //Conversation Created

             $createdMessage = Message::create(['conversation_id'=>$checkedConversation->id, 'sender_id' => auth()->user()->id, 'receiver_id' => $receiverId, 'body'=>$this->message]);

             $createdConversation->last_time_message = $createdMessage->created_at;
             $createdConversation->save();

             dd('saved');
        }

        elseif (count($checkedConversation) >=1) {
             dd('Conversation exists');
        }

        else {

        }

    }

    public function render()
    {

        $this->users = User::where('id', '!=', auth()->user()->id)->get();

       return view('livewire.chat.create-chat');
    }
}
