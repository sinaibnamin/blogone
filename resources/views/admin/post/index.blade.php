@extends('layouts.admin')
@section('content')
<div class="my-4">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{route('website')}}">Home</a></li>

      <li class="breadcrumb-item active" aria-current="page">post</li>
    </ol>
  </nav>
</div>
<h2>post list</h2>
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<div class="card">
              <div class="card-header d-flex">
                <div class="">
  <h3 class="card-title">post list</h3>
                </div>

                <div class="ml-auto">
                  <a class="btn btn-primary" href="{{route('post.create')}}">create new post</a>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>image</th>
                      <th>title</th>
                      <th>category</th>
                      <th>author</th>
                      <th>tags</th>
                      <th>action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($posts as $post)
                      <tr>
                    <td>{{$post->id}}</td>
                    <td>
                      <img height="50" width="50" src="{{asset('images')}}/{{$post->image}}" alt="">
                    </td>
                    <td>{{$post->title}}</td>
                    <td>{{$post->category->name}}</td>
                    <td>{{$post->user->name}}</td>
                    <td>
                      @foreach ($post->tags as $key => $value)
                        <span class="badge badge-primary" >{{$value->name}}</span>

                      @endforeach
                      {{-- {{$post->tags}} --}}
                    </td>


                    <td>
                      <a href="{{route('post.edit',[$post->id])}}" class="btn btn-primary m-1">edit</a>
                      <form class="" action="{{route('post.destroy',[$post->id])}}" method="post">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-danger m-1" type="submit" name="button">delete</button>
                      </form>
                      <a href="{{route('post.show',[$post->id])}}" class="btn btn-info m-1">view</a>

                    </td>
                      </tr>
                    @endforeach


                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
@endsection
