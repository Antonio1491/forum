<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Reply;
// use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use function PHPUnit\Framework\isNull;

class ShowReply extends Component
{
    // use AuthorizesRequests;

    public Reply $reply;
    public $body = '';
    public $is_creating = false;
    public $is_editing = false;

    public function updatedIsCreating()
    {
        $this->is_editing = false;
        $this->body = '';
    }

    public function updatedIsEditing()
    {
        
        $this->authorize('update', $this->reply);

        $this->is_creating = false;
        
        $this->body = $this->reply->body;
    }

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

    public function updateReply(){

        $this->authorize('update', $this->reply);

        //validar
        $this->validate(['body' => 'required']);

        //actualizar
        $this->reply->update([
            'body' => $this->body
        ]);

        //refrescar
        $this->is_editing = false;
    }
}
