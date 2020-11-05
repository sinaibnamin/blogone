@extends('layouts.admin')
@section('content')
<div class="my-4">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{route('website')}}">Home</a></li>

      <li class="breadcrumb-item active" aria-current="page">user</li>
    </ol>
  </nav>
</div>
<h2>user Create</h2>
<div class="card">
              <div class="card-header d-flex">
                <div class="">
  <h3 class="card-title">user create</h3>
                </div>

                <div class="ml-auto">
                  <a class="btn btn-primary" href="{{route('user.index')}}">go back user list</a>
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

                  <form action="{{route('user.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                      <div class="form-group">
                        <label>user name</label>
                        <input name="name" type="text" class="form-control"  >
                      </div>
                      <div class="form-group">
                        <label>user email</label>
                        <input name="email" type="text" class="form-control"  >
                      </div>
                      <div class="form-group">
                        <label>user password</label>
                        <input name="password" type="password" class="form-control"  >
                      </div>


                    </div>

                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                  </form>
                </div>
            </div>
@endsection
