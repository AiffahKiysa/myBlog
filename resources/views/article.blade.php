<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Article') }}
        </h2>
    </x-slot>

    @if ($articles->count())
        <div class="card mb-3">
            <img src="https://source.unsplash.com/1200x400?{{ $articles[0]->category->name }}" class="card-img-top" alt="{{ $articles[0]->category->name }}">
            <div class="card-body text-center">
                <h3 class="card-title">
                    <a href="/article/{{ $articles[0]->slug }}" class="text-decoration-none text-dark">
                    {{ $articles[0]->title }}
                    </a>
                <p>
                    <small class="text-muted">
                    <h6>By: <a href="/authors/{{ $articles[0]->author->username }}" class="text-decoration-none"> {{ $articles[0]->author->name }} </a> in 
                        <a href="/categories/{{ $articles[0]->category->slug }}" class="text-decoration-none"> {{ $articles[0]->category->name  }} </a>
                        {{ $articles[0]->created_at->diffForHumans() }}
                    </h6>
                    </small>
                </p>
                <p class="card-text">{{ $articles[0]->excerpt }}</p>

                <a href="/article/{{ $articles[0]->slug }}" class="text-decoration-none btn btn-dark">Read more..</a>
            </div>
        </div>
    
    <div class="container">
        <div class="row">
            @foreach($articles->skip(1) as $article)
            <div class="col-md-4 mb-3">
                <div class="card">
                <div class="position-absolute px-3 py-2" style="background-color: rgba(29, 20, 150, 0.8)">
                    <a href="/categories/{{ $article->category->slug }}"class="text-decoration-none text-white">{{ $article->category->name  }}</a>
                </div>
                    <img src="https://source.unsplash.com/500x400?{{ $article->category->name }}" class="card-img-top" alt="{{ $article->category->name }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $article->title }}</h5>
                        <p>
                            <small class="text-muted">
                            <h6>By: <a href="/authors/{{ $article->author->username }}" class="text-decoration-none"> {{ $article->author->name }} </a> 
                                {{ $article->created_at->diffForHumans() }}
                            </h6>
                            </small>
                        </p>
                      <p class="card-text">{{ $article->excerpt }}</p>
                      <a href="/article/{{ $article->slug }}" class="btn btn-dark">Read more</a>
                    </div>
                  </div>
            </div>
            @endforeach
        </div>
    </div>

    @else
        <p class="text-center fs-4">No post found.</p>
    @endif
</x-app-layout>