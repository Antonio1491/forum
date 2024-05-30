<div>
    <div class="rounded-md bg-gradient-to-r from-slate-900 hover:to-slate-800 mb-4">
        <div class="p-4 flex gap-4">
            <div>
                <img 
                class="rounded-md"
                src="{{ $reply->user->avatar() }}" alt="{{ $reply->user->name }}">
            </div>
            <div class="w-full">
                <p class="mb-2 text-blue-600 font-semibold flex items-center justify-between w-full text-xs">
                    {{$reply->user->name}}
                </p>
                <p class="text-white/60 text-xs">
                    {{ $reply->body }}
                </p>

                {{-- formulario --}}
                @if ($is_creating)
                    <form wire:submit.prevent="postChild" class="mt-4">
                        <input 
                            type="text" name="" id="" 
                            placeholder="Escribe una respuesta" 
                            class="bg-slate-800 border-1 border-slate-900 rounded-md w-full p-3 text-white/60 text-xs"
                            wire:model="body"
                            @keydown.enter="$wire.$refresh()">
                    </form>
                @endif

                <p class="mt-4 text-white/60 text-xs flex gap-2 justify-end">
                    @if (is_null($reply->reply_id))    
                        <a href="#" wire:click.prevent="$toggle('is_creating')" class="hover:text-white">Responder</a>
                    @endif
                        <a href="#" class="hover:text-white">Editar</a>
                    
                </p>
            </div>
        </div>
    </div>

    @foreach ($reply->replies as $item)
        <div class="ml-8">
        @livewire('show-reply', ['reply' => $item], key('reply-'.$item->id))
        </div>
    @endforeach
</div>
