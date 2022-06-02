@extends('layouts.main')

@section('container')

<div class="container">
  <div class="row justify-content-center mb-5">
    <div class="col-md-8">
        <h2>{{ $article->title }}</h2>
        <p> By. <a href="/articles?author={{ $article->author->username }}" class="text-decoration-none">{{ $article->author->name }}</a> in <a href="/articles?category={{ $article->category->slug }}"class="text-decoration-none">{{ $article->category->name }} </a></p>
        @if($article->image)
            <div style="max-height: 350px; overflow:hidden;">
              <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->category->name }}" class="img-fluid">
            </div>
            
            @else
            <img src="https://source.unsplash.com/1200x400?{{ $article->category->name }}" alt="{{ $article->category->name }}" class="img-fluid">
            @endif
      <article class="my-2 fs-5">
        {!! $article->content !!}
      </article>
      <a href="/articles"class="d-block mt-3">Back to articles</a>
    </div>
  </div>
</div>

@endsection
