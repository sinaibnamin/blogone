@extends('layouts.admin')
@section('content')
<div class="my-4">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{route('website')}}">Home</a></li>

      <li class="breadcrumb-item active" aria-current="page">Category</li>
    </ol>
  </nav>
</div>
<h2>category Edit</h2>
<div class="card">
              <div class="card-header d-flex">
                <div class="">
  <h3 class="card-title">category edit</h3>
                </div>

                <div class="ml-auto">
                  <a class="btn btn-primary" href="{{route('category.index')}}">go back Category list</a>
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



                  <form action="{{route('category.update',[$category->id])}}" method="post">
                    @csrf
                    @method('put')
                    <div class="card-body">
                      <div class="form-group">
                        <label>category name</label>
                        <input value="{{$category->name}}" name="name" type="text" class="form-control"  >
                      </div>
                      <div class="form-group">
                        <label>category description</label>
                        <textarea  name="description" type="text" class="form-control" rows="8" cols="80">{{$category->description}}</textarea>
                      </div>

                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary">update category</button>
                    </div>
                  </form>
                </div>
            </div>
@endsection
