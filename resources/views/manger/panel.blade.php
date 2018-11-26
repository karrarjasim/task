@extends('layouts.app')

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
  @if($upload->status == 0)
<tr>
<td>{{$upload->id}}</td>
<td>{{$upload->uploader_name}}</td>
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
@endsection

