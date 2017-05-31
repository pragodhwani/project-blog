@extends('layouts.admin')




@section('content')


    <h1>Posts</h1>
    <table class="table table-hover">
        <thead>
          <tr>
              <th>Id</th>
              <th>Photo</th>
              <th>Category Id</th>
              <th>Title</th>
              <th>Body</th>
              <th>Author</th>
              <th>Created At</th>
              <th>Updated At</th>
          </tr>
        </thead>
        <tbody>
        @if($posts)
            @foreach($posts as $post)
              <tr>
                  <td>{{$post->id}}</td>
                  <td><img class="image2" src ="{{$post->photo?$post->photo->file:"http://placehold.it/400x400"}}"></td>
                  <td>{{$post->category}}</td>
                  <td>{{$post->title}}</td>
                  <td>{{$post->body}}</td>
                  <td>{{$post->user->name}}</td>
                  <td>{{$post->created_at}}</td>
                  <td>{{$post->updated_at}}</td>
              </tr>
            @endforeach
        @endif
        </tbody>
      </table>

    @stop