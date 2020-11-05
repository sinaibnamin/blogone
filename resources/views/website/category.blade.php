@extends('layouts.website')
@section('content')
    <!-- Page Heading/Breadcrumbs -->

<p class="mt-3">category name:</p>
<h2>{{$category->name}}</h2>


    <!-- Image Header -->
    <img class="img-fluid rounded mb-4" src="http://placehold.it/1200x300" alt="">

    <!-- Marketing Icons Section -->
    <div class="row">


        @foreach ($posts as $post)
          <div class="col-lg-4 col-sm-6 portfolio-item p-2">
            <div class="card h-100">
              <a href="{{route('website.post',['slug'=>$post->slug])}}"><img class="card-img-top" src="{{asset('images')}}/{{$post->image}}" alt=""></a>
              <div class="card-body">
                <h4 class="card-title">
                  <a href="#">{{$post->title}}</a>
                </h4>
                <p class="card-text">{{$post->description}}</p>
                <p>by : {{$post->user->name}}</p>
                <p>tags :
                  @foreach ($post->tags as $key => $value)
                    <span class="badge badge-primary" >{{$value->name}}</span>
                  @endforeach

                </p>
                <p>category : {{$post->category->name}}</p>
              </div>
            </div>
          </div>
        @endforeach



      </div>
      <div class="">
    {{$posts->links()}}
      </div>

    <!-- /.row -->

    @endsection
