@extends('layouts.admin')

@section('content')
    <h1>Users</h1>
    <p>{{\Carbon\Carbon::now()}}</p>
    <table class="table table-hover">
        <thead>
          <tr>
              <th>Id</th>
              <th>Name</th>
              <th>Email</th>
              <th>Role</th>
              <th>Status</th>
              <th>Created At</th>
              <th>Updated At</th>
          </tr>
        </thead>
        <tbody>
        @if($users)
            @foreach($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
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
                </tr>
            @endforeach
        @endif
        </tbody>
      </table>


@stop