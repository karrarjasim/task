@extends('adminlte::page')

@section('title', 'Users List')

@section('content_header')
    <h1>Users List</h1>
@stop

@section('content')
    <table class="table table-bordered ">
    <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">name</th>
      <th scope="col">email</th>
      <th scope="col">created at</th> 
      <th scope="col"></th>
    </tr>
  </thead>
    @foreach($users as $user )
    <tr>
    <td>{{$user->id}}</td>
    <td>{{$user->name}}</td>
    <td>{{$user->email}}</td>
    <td>{{$user->created_at}}</td>
    @if($user->id != 1)
    <td><a class="btn btn-info" href="/admin/make-manger/{{$user->id}}">make as manger</a></td>
    @else
    <td>{{"Admin"}}</td>

@endif

    </tr>
    @endforeach
    </table>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop