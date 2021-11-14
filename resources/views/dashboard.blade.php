<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if(session()->has('success'))
                <div class="bg-green-400 text-green-800 rounded p-4 shadow mb-4 font-bold">
                    Ação realizada com sucesso!
                </div>
            @endif

            <div class="flex justify-end w-full">
                <a href="{{route('posts.create')}}" class="bg-green-400 text-green-800 px-4 py-2 rounded block mb-4">Cria Post</a>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <ul>
                        @forelse ($posts as $post)
                            <li class="border-b py-4"> 
                                <div class="flex justify-between">
                                    <a href="{{route('posts.edit', ['id' => $post->id])}}" class="w-full h-full block">
                                        {{$post->title}}
                                    </a>
                                    <form action="{{route('posts.destroy', ['id' => $post->id])}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-400 text-red-800 py-1 px-2 rounded text-xs">Deletar</button>
                                    </form>
                                </div>
                            </li>
                        @empty
                            Nenhum post criado
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
