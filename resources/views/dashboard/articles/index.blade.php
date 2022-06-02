@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">My Articles</h1>   
  </div>  
@if(session()->has('success'))
<div class="alert alert-success col-lg-8" role="alert">
  {{ session('success') }}
</div>
@endif
  <div class="table-responsive col-lg-8">
    <a href="/dashboard/articles/create" class="btn btn-primary mb-3">Create new article</a>
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Title</th>
          <th scope="col">Category</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
          @foreach ($articles as $article)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $article->title }}</td>
          <td>{{ $article->category->name }}</td>
          <td>
              <a href="/dashboard/articles/{{ $article->slug }}" class="badge bg-dark"><span data-feather="eye"></span></a>
              <a href="/dashboard/articles/{{ $article->slug }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
              <form action="/dashboard/articles/{{ $article->slug }}" method="post" class="d-inline">
              @method('delete')
              @csrf
              <button class="badge bg-danger border-0" onclick="return confirm('Are you sure delete this article?')"><span data-feather="x-circle"></span></button>
              </form>
        </td>
    </tr>  
    @endforeach
      </tbody>
    </table>
  </div>

@endsection
