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
<h2>tag Create</h2>
<div class="card">
              <div class="card-header d-flex">
                <div class="">
  <h3 class="card-title">tag create</h3>
                </div>

                <div class="ml-auto">
                  <a class="btn btn-primary" href="{{route('tag.index')}}">go back tag list</a>
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

                  <form action="{{route('tag.store')}}" method="post">
                    @csrf
                    <div class="card-body">
                      <div class="form-group">
                        <label>tag name</label>
                        <input name="name" type="text" class="form-control"  >
                      </div>
                      <div class="form-group">
                        <label>tag description</label>
                        <textarea name="description" type="text" class="form-control" rows="8" cols="80"></textarea>
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
