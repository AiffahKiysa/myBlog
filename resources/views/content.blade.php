<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $article->title }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

        <h6>By: <a href="/authors/{{ $article->author->username }}" class="text-decoration-none"> {{ $article->author->name  }} </a>in 
            <a href="/categories/{{ $article->category->slug }}" class="text-decoration-none"> {{ $article->category->name  }} </a>
        </h6>

        {!! $article->body !!}

        <a href="/article" class="d-block mt-3">Back</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
