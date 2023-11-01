{{-- Extends the Master file--}}
@extends('../master')
{{-- Title--}}
@section('title','Priority List')
{{-- heading content --}}
@section('heading','All Priority')
{{-- Main content--}}
@section('main_content')

<h1 class="text-center">All priority</h1>
<table id="example2" id="datatable" class="table table-bordered table-hover">
    <thead>
    <tr>
      <th>id</th>
      <th>Priority name</th>
      <th>Priority code</th>
      <th>Created At</th>
      <th>Updated At</th>
      <th>Action</th>
    </tr>
    </thead>
    <tbody>
@foreach($all_data as $data)
    <tr>
      <td>{{$data->id}}</td>
      <td>{{$data->priority_name}}</td>
      <td>{{$data->priority_code}}</td>
      <td>{{$data->created_at}}</td>
      <td>{{$data->updated_at}}</td>
      <td><a class="btn btn-success" href="view/{{$data->id}}">View</a> | <a href="/priority/edit/{{$data->id}}" class="btn btn-primary">Edit</a> | <a class="btn btn-danger" href="/priority/delete/{{$data->id}}" onclick="return confirm('Are you sure?')">Delete</a></td>
    </tr>
@endforeach
     </tbody>
    <tfoot>
    <tr>
      <th></th>
      <th></th>
      <th></th>
      <th></th>
      <th></th>
      <th></th>
    </tr>
    </tfoot>
  </table>

@endsection

