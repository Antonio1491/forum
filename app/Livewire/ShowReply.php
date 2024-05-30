<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Reply;

use function PHPUnit\Framework\isNull;

class ShowReply extends Component
{

    public Reply $reply;
    public $body = '';
    public $is_creating = false;

    public function render()
    {
        return view('livewire.show-reply');
    }

    public function postChild(){

        if(!is_null($this->reply->reply_id)) return;

        //validar
        $this->validate(['body' => 'required']);

        //crear
        auth()->user()->replies()->create([
            'reply_id' => $this->reply->id,
            'thread_id' => $this->reply->thread->id,
            'body' => $this->body
        ]);

        //refrescar
        $this->is_creating = false;
        $this->body = '';
        

    }
}
