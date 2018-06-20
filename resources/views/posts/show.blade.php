@extends('layouts.app')

@section('content')
      <a href="/posts" class="btn btn-default">Go back</a>
     <h1>{{$post->title}}</h1>
     <img style="width:100%" src="/storage/cover_images/{{$post->cover_image}}">
     <div>
         {!!$post->body!!}
     </div>
     <hr>
    <small>Written on {{$post->created_at}} by {{$post->user->name}}</small>
     <hr>
     @if(!auth::guest())
       @if(auth::user()->id == $post->user_id)
    <a href="/posts/{{$post->id}}/edit" class="btn btn-default">Edit</a>
    
    {!!Form::open(['action'=>['PostsController@destroy',$post->id],'method'=>'POST','class'=>'pull-right'])!!}
    {{Form::hidden('_method','DELETE')}}
    {{Form::submit('delete',['class'=>'btn btn-danger'])}}
    {!!Form::close() !!}
        @endif
    @endif
@endsection