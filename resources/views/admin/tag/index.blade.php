@extends('layouts.admin')
@section('content')
<div class="my-4">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{route('website')}}">Home</a></li>

      <li class="breadcrumb-item active" aria-current="page">tag</li>
    </ol>
  </nav>
</div>
<h2>tag list</h2>
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<div class="card">
              <div class="card-header d-flex">
                <div class="">
  <h3 class="card-title">tag list</h3>
                </div>

                <div class="ml-auto">
                  <a class="btn btn-primary" href="{{route('tag.create')}}">create new tag</a>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>name</th>
                      <th>slug</th>
                      <th>count</th>
                      <th>action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($tags as $tag)
                      <tr>
                    <td>{{$tag->id}}</td>
                    <td>{{$tag->name}}</td>
                    <td>{{$tag->slug}}</td>

                    <td>oooo</td>
                    <td>
                      <a href="{{route('tag.edit',[$tag->id])}}" class="btn btn-primary">edit</a>
                      <form class="" action="{{route('tag.destroy',[$tag->id])}}" method="post">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-danger" type="submit" name="button">delete</button>
                      </form>
                    </td>
                      </tr>
                    @endforeach


                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
@endsection
