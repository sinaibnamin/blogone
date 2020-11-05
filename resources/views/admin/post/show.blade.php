@extends('layouts.admin')
@section('content')
<h2>post view</h2>
<a href="{{route('post.index')}}" class="btn btn-primary">back to list</a>

<div class="mt-5">
<span class="font-weight-bold">post image: </span> <img height="50" width="50" src="{{asset('images')}}/{{$post->image}}" alt="">  <br>
<span class="font-weight-bold">post title: </span> {{$post->title}} <br>
<span class="font-weight-bold">post author: </span> {{$post->user->name}} <br>
<span class="font-weight-bold">post category: </span> {{$post->category->name}} <br>
<span class="font-weight-bold">post slug: </span> {{$post->slug}} <br>
<span class="font-weight-bold">post description: </span> {{$post->description}} <br>
<span class="font-weight-bold">post tags: </span>
@foreach ($post->tags as $key => $value)
  <span class="badge badge-primary"> {{$value->name}}</span>
@endforeach
 <br>
</div>



@endsection
