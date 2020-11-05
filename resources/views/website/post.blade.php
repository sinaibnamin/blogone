@extends('layouts.website')
@section('content')
    <!-- Page Heading/Breadcrumbs -->
    <h1 class="mt-4 mb-3">{{$post->title}}  </h1>
    <h6>by {{$post->user->name}}</h6>

  <hr>

    <div class="row">

      <!-- Post Content Column -->
      <div class="col-lg-8">

        <!-- Preview Image -->
        <img style="width:400px; height:200px" class="img-fluid rounded" src="{{asset('images')}}/{{$post->image}}" alt="">

        <hr>

        <!-- Date/Time -->
        <p>Posted on {{$post->published_at}}</p>

        <hr>
        <p>tags :
          @foreach ($post->tags as $key => $value)
            <span class="badge badge-primary" >{{$value->name}}</span>
          @endforeach
        </p>
          <p>category : {{$post->category->name}}</p>

        <!-- Post Content -->
      <p>{{$post->description}}</p>
        <hr>

        <!-- Comments Form -->
        <div class="card my-4">
          <h5 class="card-header">Leave a Comment:</h5>
          <div class="card-body">
            <form>
              <div class="form-group">
                <textarea class="form-control" rows="3"></textarea>
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
          </div>
        </div>

        <!-- Single Comment -->
        <div class="media mb-4">
          <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
          <div class="media-body">
            <h5 class="mt-0">Commenter Name</h5>
            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
          </div>
        </div>

        <!-- Comment with nested comments -->
        <div class="media mb-4">
          <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
          <div class="media-body">
            <h5 class="mt-0">Commenter Name</h5>
            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.

            <div class="media mt-4">
              <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
              <div class="media-body">
                <h5 class="mt-0">Commenter Name</h5>
                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
              </div>
            </div>

            <div class="media mt-4">
              <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
              <div class="media-body">
                <h5 class="mt-0">Commenter Name</h5>
                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
              </div>
            </div>

          </div>
        </div>

      </div>

      <!-- Sidebar Widgets Column -->
      <div class="col-md-4">

        <!-- Search Widget -->
        <div class="card mb-4">
          <h5 class="card-header">Search</h5>
          <div class="card-body">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Search for...">
              <span class="inpug-group-append">
                <button class="btn btn-secondary" type="button">Go!</button>
              </span>
            </div>
          </div>
        </div>

        <!-- Categories Widget -->
        <div class="card my-4">
          <h5 class="card-header">Categories</h5>
          <div class="card-body">
            <div class="row">
              <div class="col-12">
                <ul class="list-unstyled mb-0">
                  @foreach ($categories as $c)
                    <li>
                      <a href="{{route('website.category',$c->slug)}}">{{$c->name}}</a>
                    </li>
                  @endforeach
                </ul>
              </div>
            </div>
          </div>
        </div>
        <!-- Categories Widget -->
        <div class="card my-4">
          <h5 class="card-header">Tags</h5>
          <div class="card-body">
            <div class="row">
              <div class="col-12">
                <ul class="list-unstyled mb-0">
                  @foreach ($tags as $t)
                    <li>
                      <a href="{{route('website.tag',$t->slug)}}">{{$t->name}}</a>
                    </li>
                  @endforeach
                </ul>
              </div>
            </div>
          </div>
        </div>



        <div class="card my-4">
          <h5 class="card-header">Related posts</h5>
          <div class="card-body">
            <div class="row">
              <div class="col-12">
                <ul class="list-unstyled mb-0">
                  @foreach ($trp as $key => $post)
                      <li>  <a href="{{route('website.post',['slug'=>$post->slug])}}">{{ $post->title }}</a</li>
                  @endforeach
                </ul>
              </div>
            </div>
          </div>
        </div>



      </div>

    </div>
    <!-- /.row -->
@endsection
