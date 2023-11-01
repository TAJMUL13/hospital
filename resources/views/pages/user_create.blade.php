{{-- Extends the Master file--}}
@extends('../master')
{{-- Title--}}
@section('title','Add New User')
{{-- heading content --}}
@section('heading','Add New User')
{{-- Main content--}}
@section('main_content')
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- Default box -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Add New User</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fas fa-minus"></i></button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                    <i class="fas fa-times"></i></button>
                </div>
              </div>
              <div class="card-body">
                {{-- show error --}}
              @if ($errors->any())
                <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                      @endforeach
                  </ul>
                </div><br />
              @endif
              {{-- end show error --}}
				<form  method="POST" action="/user/store">
					@csrf
					<div class="form-group">
						<label for="contact_name">Name</label>
						<input type="text" class="form-control" id="contact_name" placeholder="Area Name" name="name">
					</div>
			      <div class="form-group">
			        <label for="number">Email</label>
			        <input type="text" class="form-control" id="number" placeholder="Area Code" name="email">
			      </div>
            <div class="form-group">
              <label for="number">Password</label>
              <input type="password" class="form-control" id="number" placeholder="Latitude" name="password">
            </div>
            <div class="form-group">
              <label for="number">Permission List</label> <br>

@foreach($all_permissions as $permission)
              <input id="all" type="checkbox" name="permissions[]" value="{{$permission->name}}"> {{$permission->name}} <br>
@endforeach
            </div>
           
				    <div class="card-footer">
				      <button type="submit" class="btn btn-primary">Create User</button>
				    </div>
				</form>
              </div>
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
    </section>

@endsection