
@extends('layouts.app')

@section('title', 'Edit Post')

@section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>
@endsection

@section('content')
{!!Form::open(["route" => ["posts.update",$post->id], "method" => "put"])!!}
<div class="form-group" >
    <label for="title">Post Title</label>
{!!Form::text('title',"$post->title")!!}

  </div>
  <div class="form-group">
    <label for="content">Post Content</label>
    {!!Form::text('content',"$post->content")!!}
  </div>
{!! Form::submit('Submit');!!}
{!! Form::close() !!} 
 
@endsection

