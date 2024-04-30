<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex wap-10 py-12">
    <div class="w-64">
        <a href="" class="block w-full py-4 mb-10 bg-gradient-to-r from-blue-600 to-blue-700 hover:to-blue-600 text-white/90 text-xs text-center rounded font-bold">Preguntar</a>

        <ul>

            @foreach ($categories as $category)
                
                <li class="mb-2">
                    <a href="" class="p-2 rounded-md flex bg-slate-800 items-center text-white/60 hover:text-white font-semibold text-xs capitalize">
                        <span class="w-2 h-2 mr-2 rounded-full" style="background-color:{{$category->color}};"></span>
                        {{$category->name}}
                    </a>
                </li>

            @endforeach


            <li>
                <a href="" class="p-2 rounded-md flex bg-slate-800 items-center text-white/60 hover:text-white font-semibold text-xs capitalize">
                    <span class="w-2 h-2 mr-2 rounded-full" style="background-color:#000000;"></span>
                    todos los resultados
                </a>
            </li>
        </ul>
    </div>
    <div class="w-full">
        {{-- formulario --}}
        @foreach ($threads as $thread)
            <div class="rounded-md bg-gradient-to-r from-slate-900 hover:to-slate-800 mb-4">
                <div class="p-4 flex gap-4">
                    <div>Image, avatar</div>
                    <div class="w-full">
                        <h2 class="mb-4 flex items-start justify-between">
                            <a href="#" class="text-xl font-semibold text-white/90">
                                {{$thread->title}}
                            </a>
                            <span 
                                class="rounded-full text-xs py-2 px-4 capitalize" 
                                style="color: #00aced; border: 1px solid #00aced;">
                                Categoría
                            </span>
                        </h2>
                        <p></p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>