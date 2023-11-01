{{-- Extends the Master file--}}
@extends('../master')
{{-- Title--}}
@section('title','Location List')
{{-- heading content --}}
@section('heading','All Locations')
{{-- Main content--}}
@section('main_content')

<h1 class="text-center">All Locations</h1>
<table id="example2" id="datatable" class="table table-bordered table-hover">
    <thead>
    <tr>
      <th>id</th>
      <th>Area name</th>
      <th>Area code</th>
      <th>Latitude</th>
      <th>Longitude</th>
      <th>Created At</th>
      <th>Updated At</th>
      <th>Action</th>
    </tr>
    </thead>
    <tbody>
@foreach($all_data as $data)
    <tr>
      <td>{{$data->id}}</td>
      <td>{{$data->area_name}}</td>
      <td>{{$data->area_code}}</td>
      <td>{{$data->latitude}}</td>
      <td>{{$data->longitude}}</td>
      <td>{{$data->created_at}}</td>
      <td>{{$data->updated_at}}</td>
      <td><a class="btn btn-success" href="view/{{$data->id}}">View</a> | <a href="/location/edit/{{$data->id}}" class="btn btn-primary">Edit</a> | <a class="btn btn-danger" href="/location/delete/{{$data->id}}" onclick="return confirm('Are you sure?')">Delete</a></td>
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

