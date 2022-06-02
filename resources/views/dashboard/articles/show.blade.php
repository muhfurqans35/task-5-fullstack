@extends('dashboard.layouts.main')

@section('container')
<div class="container">
    <div class="row my-3">
      <div class="col-lg-8">
          <h2>{{ $article->title }}</h2>
          <a href="/dashboard/articles" class="btn btn-white"><span data-feather="arrow-left"></span> Back to my posts</a>
          <a href="/dashboard/articles/{{ $article->slug }}/edit" class="btn btn-white"><span data-feather="edit"></span> Edit</a>
          <form action="/dashboard/articles/{{ $article->slug }}" method="post" class="d-inline">
            @method('delete')
            @csrf
            <button class="btn btn-white" onclick="return confirm('Are you sure delete this article?')"><span data-feather="x-circle"></span> Delete</button>
            </form>

            @if($article->image)
            <div style="max-height: 350px; overflow:hidden;">
              <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->category->name }}" class="img-fluid mt-3">
            </div>
            
            @else
            <img src="https://source.unsplash.com/1200x400?{{ $article->category->name }}" alt="{{ $article->category->name }}" class="img-fluid mt-3">
            @endif
        <article class="my-2 fs-5">
          {!! $article->content !!}
        </article>
      </div>
    </div>
  </div>
@endsection


