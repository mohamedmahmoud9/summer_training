
@extends('layouts.app')

@section('title', 'Home')

@section('sidebar')
    @parent
@endsection

@section('content')
<h2>Welcome {{Auth::user()->name}}</h2>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Username</th>
      <th scope="col">Title</th>
      <th scope="col">Content</th>
      <th scope="col">UserID</th>
      <th scope="col">Edit</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>
      @foreach ($posts as $post)
      <tr>
      <td>{{$post->id}}</td>
      <td>{{$post->user->name}}</td>
      <td>{{$post->title}}</td>
      <td>{{$post->content}}</td>
      <td>{{$post->user_id}}</td>
      <td><a href="/posts/{{$post->id}}/edit"> Edit</a></td>
      <td>  {!!Form::open(["route" => ["posts.destroy",$post->id], "method" => "delete"])!!}
      {!!Form::submit('Delete')!!}
      </td>
      <!-- <input type="button" value="Delete"></td> -->
      <!-- <td><a href="post">{{$post->id}}</a></td> -->
    </tr>
      @endforeach
  

  </tbody>
</table>

@endsection

