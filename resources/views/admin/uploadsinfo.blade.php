@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Uploads Informations</h1>
@stop

@section('content')
    <table class="table table-bordered ">
    <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Uploader name</th>
      <th scope="col">file name</th>
      <th scope="col">file path</th>
      <th scope="col">file size</th> 
      <th scope="col">file extension</th> 
      <th scope="col">created at</th> 

      <th scope="col"></th>
    </tr>
  </thead>
  @foreach($uploads as $upload)
<tr>
<td>{{$upload->id}}</td>
<td>{{$upload->uploader_name}}</td>
<td>{{$upload->title}}</td>
<td>  <?php echo public_path() . '/uploads';?>{{$upload->file}}</td>
<td>{{$upload->file_size}}</td>
<td>{{$upload->file_extension}}</td>
<td>{{$upload->created_at}}</td>
<td><a class="btn btn-danger" href="/delete-file/{{$upload->id}}">Delete</a></td>
<td><a class="btn btn-success" href="/admin/forward-file/{{$upload->id}}">Forward</a></td>
</tr>
@endforeach
    </table>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop