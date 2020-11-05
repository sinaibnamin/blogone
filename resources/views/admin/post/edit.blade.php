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
<h2>post edit</h2>
<div class="card">
              <div class="card-header d-flex">
                <div class="">
  <h3 class="card-title">post edit</h3>
                </div>

                <div class="ml-auto">
                  <a class="btn btn-primary" href="{{route('post.index')}}">go back post list</a>
                </div>
              </div>
              <div class="card card-primary">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                  <form action="{{route('post.update',[$post->id])}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="card-body">
                      <div class="form-group">
                        <label>post title</label>
                        <input value="{{$post->title}}" name="title" type="text" class="form-control"  >
                      </div>
                      <div class="form-group">
                        <label>post category</label>
                        <select class="" name="category">
                          @foreach ($categories as $category)
                            @php
                                $selected='';
                                if ($category->id==$post->category->id) {
                                  $selected='selected';
                                }
                            @endphp

                            <option {{$selected}} value="{{$category->id}}">{{$category->name}}</option>
                          @endforeach

                        </select>
                      </div>
                      <div class="d-flex mb-2">
                        <div class="">
                          old image:
                        </div>
                        <div class="">
                          <img width="20" height="20" src="{{asset('images')}}/{{$post->image}}" alt="">
                        </div>
                      </div>
                      <div class="form-group">
                        <label>post image</label>
                        <input name="image" type="file" class="form-control"  >
                      </div>

                      <div class="">



                        @foreach ($tags as $tag)

                          <input
                          @foreach ($post->tags as $key => $value)
                            @php

                              if ($tag->id==$value->id) {
                                  echo 'checked';
                              }
                            @endphp
                            @endforeach
                            type="checkbox" id="{{$tag->name}}" name="tags[]" value="{{$tag->id}}">
                          <label class="mr-4 ml-1" for="{{$tag->name}}">{{$tag->name}}</label>
                        @endforeach
                      </div>
                      <div class="form-group">
                        <label>post description</label>
                        <textarea name="description" type="text" class="form-control" rows="8" cols="80">{{$post->description}}</textarea>
                      </div>

                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                  </form>
                </div>
            </div>
@endsection
