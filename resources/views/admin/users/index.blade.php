@extends('layouts.admin')

@section('content')
    <h1>Users</h1>
    <p>{{\Carbon\Carbon::now()}}</p>
    <table class="table table-hover">
        <thead>
          <tr>
              <th>Id</th>
              <th>Photo</th>
              <th>Name</th>
              <th>Email</th>
              <th>Role</th>
              <th>Status</th>
              <th>Created At</th>
              <th>Updated At</th>
              <th>Operations</th>
          </tr>
        </thead>
        <tbody>
        @if($users)
            @foreach($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td><img class="image2" src ="{{$user->photo?$user->photo->file:"http://placehold.it/400x400"}}"></td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->role->name}}</td>
                    <td>@if($user->is_active==1)
                            <img class="status1" src="../images/online.png" >
                        @else
                            <img src="../images/offline.png" class="status1">
                        @endif
                    </td>
                    <td>{{$user->created_at->diffForHumans()}}</td>
                    <td>{{$user->updated_at->diffForHumans()}}</td>
                    <td><a href="{{route('admin.users.edit',$user->id)}}"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a></td>
                </tr>
            @endforeach
        @endif
        </tbody>
      </table>


@stop