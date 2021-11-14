<x-guest-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 my-4">
        <h1 class="font-bold text-lg underline">
            Posts
        </h1>
    </div>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="grid grid-cols-3 gap-4 mb-4">
            @forelse($posts as $post)
                <a href="{{route('posts.show', ['id' => $post->id])}}">
                    <div class="bg-white rounded shadow overflow-hidden">
                        @if($post->image)
                            <img src="{{ url('storage/' . $post->image)}}" alt="{{$post->title}}" class="w-full h-40 object-cover">
                        @else
                            <div class="w-full h-40 bg-gray-200 flex items-center justify-center">
                                <p class="text-gray-400">Nenhuma imagem cadastrada.</p>
                            </div>
                        @endif
                        <div class="p-4 flex flex-col justify-between h-36">
                            <div>
                                <h1 class="font-bold">{{$post->title}}</h1>
                                <p class="mb-4">{{ Str::limit($post->description, 30, ' (...)') }}</p>
                            </div>
                            <div class="flex justify-between text-xs text-gray-600">
                                <div>
                                    <p class="font-semibold">Criado por:</p>
                                    <p>{{$post->user->name}}</p>
                                </div>
                                <div>
                                    <p class="font-semibold">Última atualização:</p>
                                    <p>{{$post->updated_at->format('d/m/Y H:i:s')}}</p>
                                </div>                        
                            </div>
                        </div>
                    </div>
                </a> 
            @empty
                <div>Nenhum post cadastrado.</div>
            @endforelse
        </div>
    </div>
</x-guest-layout>