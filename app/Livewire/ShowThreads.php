<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Models\Thread;

class ShowThreads extends Component
{
    public function render()
    {

        $categories = Category::get();
        $threads = Thread::latest()->get();

        return view('livewire.show-threads', compact('categories', 'threads'))
                ->layout('layouts.app');
    }
}
