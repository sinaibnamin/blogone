@extends('layouts.admin')
@section('content')
<div class="my-4">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="">Home</a></li>

      <li class="breadcrumb-item active" aria-current="page">user</li>
    </ol>
  </nav>
</div>
<h2>user list</h2>
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<div class="card">
              <div class="card-header d-flex">
                <div class="">
  <h3 class="card-title">user list</h3>
                </div>

                <div class="ml-auto">
                  <a class="btn btn-primary" href="{{route('user.create')}}">create new user</a>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                        <th>image</th>
                      <th>name</th>
                      <th>email</th>

                      <th>action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($users as $user)
                      <tr>

                    <td>{{$user->id}}</td>
                        <td>oooo</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>


                    <td>
                      <a href="{{route('user.edit',[$user->id])}}" class="btn btn-primary">edit</a>
                      <form class="" action="{{route('user.destroy',[$user->id])}}" method="post">
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
