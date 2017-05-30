@extends('layouts.admin')

@section('content')

    <h1>Edit User</h1>
<div class="col-md-9">
    {!! Form::model($user,['action'=>['AdminUsersController@update',$user->id],'method'=>'PATCH','files'=>'true']) !!}


    <div class="form-group">
        {!! Form::label('name','Name:') !!}
        {!! Form::text('name',null,['class'=>'form-control']) !!}
    </div>


    <div class="form-group">
        {!! Form::label('email','Email:') !!}
        {!! Form::text('email',null,['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('is_active','Status:') !!}
        {!! Form::select('is_active',['1'=>'Active','0'=>'Not Active'],null,['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('role_id','Role:') !!}
        {!! Form::select('role_id',$roles,null,['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('password','Password:') !!}
        {!! Form::password('password',['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('photo_id','File:') !!}
        {!! Form::file('photo_id',['class'=>'form-control']) !!}
    </div>

    <div class="col-md-6">
    <div class='form-group'>
        {!! Form::submit('Update User',['class'=>'form-control btn btn-success'])!!}
    </div>
    </div>

    {!! Form::close() !!}
    <div class="col-md-6">
       {!! Form::open(['action'=>['AdminUsersController@destroy',$user->id],'method'=>'DELETE']) !!}

               <div class='form-group'>
                 {!! Form::submit('Delete User',['class'=>'form-control btn btn-danger'])!!}
               </div>

           {!! Form::close() !!}
    </div>

</div>

    <div class="col-md-3">
        <img src="{{$user->photo?$user->photo->file:"http://placehold.it/400x400"}}" class="img-circle img-responsive">
    </div>

    <div class="col-md-12">

    @include('includes.form-errors')

    </div>

@stop