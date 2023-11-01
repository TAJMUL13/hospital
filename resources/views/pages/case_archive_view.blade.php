{{-- Extends the Master file--}}
@extends('../master')
{{-- Title--}}
@section('title','Case List')
{{-- heading content --}}
@section('heading','All Case')
{{-- Main content--}}
@section('main_content')

<h1 class="text-center">All Case</h1>
<table id="example2" id="datatable" class="table table-bordered table-hover">
    <thead>
    <tr>
      <th>id</th>
      <th>L. Id</th>
      <th>C. Id</th>
      <th>N. ID</th>
      <th>Case ID</th>
      <th>Date</th>
      <th>Time</th>
      <th>Gender</th>
      <th>Age</th>
      <th>Description</th>
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
      <td>{{$data->location_id}}</td>
      <td>{{$data->category_id}}</td>
      <td>{{$data->nationality_id}}</td>
      <td>{{$data->case_id}}</td>
      <td>{{$data->date}}</td>
      <td>{{$data->time}}</td>
      <td>{{$data->gender}}</td>
      <td>{{$data->age}}</td>
      <td>{{$data->description}}</td>
      <td>{{$data->latitude}}</td>
      <td>{{$data->longitude}}</td>
      <td>{{$data->created_at}}</td>
      <td>{{$data->updated_at}}</td>
      <td><a class="btn btn-success" href="view/{{$data->id}}">View</a> | <a href="/case/edit/{{$data->id}}" class="btn btn-primary">Edit</a></td>
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

