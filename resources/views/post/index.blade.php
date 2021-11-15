<x-guest-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 my-4">

    <h1 class="font-bold text-lg underline">
        {{ $post->title }}
    </h1>

    <div class="bg-white rounded shadow overflow-hidden">
        @if($post->image)
            <img src="{{ url('storage/' . $post->image)}}" alt="{{$post->title}}" class="w-full h-96 object-cover">
        @endif
        <div class="p-4 flex flex-col justify-between">
            <div>
                <p class="mb-4">
                    {{$post->description}}
                </p>
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

    <a href="{{route('home')}}" class="text-gray-800 my-4 block">
        Voltar
    </a>
</x-guest-layout>