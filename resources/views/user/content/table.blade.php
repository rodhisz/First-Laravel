@extends('user.template')

@section('content')
<div class="card">
    <div class="card-header">
        <div class="card-title">{{$title}}</div>
    </div>
    <div class="card-body">
        <div class="card-sub">
            {{$title}}
        </div>
        <table class="table mt-3">
            <thead>
                <tr>
                    <th scope="col">NO</th>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Username</th>
                    <th scope="col">Email</th>
                    <th scope="col">Address</th>
                    <th scope="col">Member Since</th>
                </tr>

            </thead>
            <tbody>
                @foreach($user as $user)
                <tr>
                    <td>{{$i++}}</td>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->username}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->address}}</td>
                    <td>{{$user->created_at}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection

