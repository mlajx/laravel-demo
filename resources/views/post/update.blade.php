<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Atualizar Post:') }} {{$post->title}}
        </h2>
    </x-slot>

    @if ($errors->any())
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white text-red-400 rounded p-4 my-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white p-4 rounded mt-4">
            <form action="{{route('posts.update', ['id' => $post->id])}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="flex flex-col mb-4">
                    <label for="image">Imagem:</label>
                    <input name="image" type="file" accept="image">
                </div>
                <div class="flex flex-col mb-4">
                    <label for="title">Título</label>
                    <input type="text" name="title" class="border border-gray-400 rounded" value="{{old('title') ?? $post->title}}">
                </div>
                <div class="flex flex-col mb-4">
                    <label for="description">Descrição</label>
                    <textarea name="description" class="border border-gray-400 rounded resize-none h-48">{{old('description') ?? $post->description}}</textarea>
                </div>
                <div class="flex justify-end">
                    <button type="submit" class="bg-green-500 px-4 py-2 text-sm text-white rounded ">Salvar</button>
                </div>
            </form>            
        </div>
    </div>
</x-app-layout>