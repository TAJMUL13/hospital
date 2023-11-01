{{-- Extends the Master file--}}
@extends('../master')
{{-- Title--}}
@section('title','Category View')
{{-- heading content --}}
@section('heading','View Category')
{{-- Main content--}}
@section('main_content')

<h1 class="text-center">Category List </h1>
<table id="example2" id="datatable" class="table table-bordered table-hover">
    <thead>
    <tr>
      <th>Id.</th>
      <th>Name</th>
      <th>Mobile</th>
      <th>Phonebook</th>
      <th>Created At</th>
      <th>Updated At</th>
      <th>Action</th>
    </tr>
    </thead>
    <tbody>
@foreach($all_data as $data)
    <tr>
      <td>{{$data->id}}</td>
      <td>{{$data->category_name}}</td>
      <td>{{$data->category_code}}</td>
      <td>{{$data->priority_name}}</td>
      <td>{{$data->created_at}}</td>
      <td>{{$data->updated_at}}</td>
      <td><a class="btn btn-success" href="view/{{$data->id}}">View</a> | <a href="/category/edit/{{$data->id}}" class="btn btn-primary">Edit</a> | <a class="btn btn-danger" href="/category/delete/{{$data->id}}" onclick="return confirm('Are you sure?')">Delete</a></td>
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

