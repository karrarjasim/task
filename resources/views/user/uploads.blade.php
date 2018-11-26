@extends('layouts.app')

@section('content')
<div class="container">
<table class="table table-dark">
<thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">name</th>
      <th scope="col">path</th>
      <th scope="col">created</th>
      <th scope="col">file size</th>
      <th scope="col">file extension</th>
      <th scope="col"></th>
    </tr>
  </thead>
@foreach($uploads as $upload)
@if($upload->user_id == Auth::user()->id)
<tr>
<td>{{$upload->id}}</td>
<td>{{$upload->title}}</td>
<td>  <?php echo public_path() . '/uploads';?>{{$upload->file}}</td>
<td>{{$upload->file_size}}</td>
<td>{{$upload->file_extension}}</td>
<td>{{$upload->created_at}}</td>
<td><a class="btn btn-danger" href="/delete-file/{{$upload->id}}">Delete</a></td>
</tr>
@endif
@endforeach
</table>
</div>
@endsection