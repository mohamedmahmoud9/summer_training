
@extends('layouts.app')

@section('title', 'New Post')

@section('sidebar')
    @parent
@endsection

@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
{!!Form::open(["route" => ["posts.store"],"method" => "post"])!!}
<div class="form-group" >
    <label for="title">Post Title</label>
{!!Form::text('title',"",['required'])!!}

  </div>
  <div class="form-group">
    <label for="content">Post Content</label>
    {!!Form::text('content',"",['required'])!!}
  </div>
{!! Form::submit('Submit');!!}
{!! Form::close() !!} 
 
@endsection

