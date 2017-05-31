@extends('layouts.admin')




@section('content')


    <h1>Create Posts</h1>

    <div class="col-md-12">

   {!! Form::open(['action'=>'AdminPostsController@store','method'=>'POST','files'=>'true']) !!}


           <div class="form-group">
              {!! Form::label('title','Title:') !!}
              {!! Form::text('title',null,['class'=>'form-control']) !!}
           </div>

            <div class="form-group">
                {!! Form::label('category_id','Category:') !!}
                {!! Form::select('category_id',['0'=>'options'],null,['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
               {!! Form::label('body','Content:') !!}
               {!! Form::textarea('body',null,['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('photo_id','Upload Image:') !!}
                {!! Form::file('photo_id',['class'=>'form-control']) !!}
            </div>

           <div class='form-group'>
             {!! Form::submit('Create Post',['class'=>'form-control btn btn-success'])!!}
           </div>

       {!! Form::close() !!}

    </div>
    <div class="col-md-12">

        @include('includes.form-errors')

    </div>


@stop