<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 flex wap-10 py-12">
    <div class="rounded-md bg-gradient-to-r from-slate-900  mb-4">
        <div class="p-4 flex gap-4">
            <div>
                <img 
                class="rounded-md"
                src="{{ $thread->user->avatar() }}" alt="{{ $thread->user->name }}">
            </div>
            <div class="w-full">
                <h2 class="mb-4 flex items-start justify-between">
                    <a href="{{ route('thread', $thread)}}" class="text-xl font-semibold text-white/90">
                        {{$thread->title}}
                    </a>
                    <span 
                        class="rounded-full text-xs py-2 px-4 capitalize" 
                        style="color: {{$thread->category->color}}; border: 1px solid {{$thread->category->color}};">
                        {{$thread->category->name}}
                    </span>
                </h2>
                <p class="mb-4 text-blue-600 font-semibold flex items-center justify-between w-full text-xs">
                    {{$thread->user->name}}
                    <span class="text-white/90">{{ $thread->created_at->diffForHumans()}}</span>
                </p>
                <p class="text-white/60">
                    {{ $thread->body }}
                </p>
            </div>
        </div>
    </div>
    {{-- repuestas --}}

    {{-- formulario --}}
    <form wire:submit.prevent="postReply" class="mb-4" >
        <input 
            type="text" name="" id="" 
            placeholder="Escribe una respuesta" 
            class="bg-slate-800 border-0 rounded-md w-1/3 p-3 text-white/60 text-xs"
            wire:model.live="search">
    </form>
</div>
