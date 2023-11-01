{{-- Extends the Master file--}}
@extends('../master')
{{-- Title--}}
@section('title','Add New Case')
{{-- heading content --}}
@section('heading','Add New Case')
{{-- Main content--}}
@section('main_content')
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- Default box -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Add New Case</h3>

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
				<form  method="POST" action="/case/store">
					@csrf
					<div class="form-group">
						<label for="contact_name">Case Id</label>
						<input type="text" class="form-control" id="contact_name" placeholder="Case Id" name="case_id">
					</div>
			      <div class="form-group">
			        <label for="number">Date</label>
			        <input type="date" class="form-control" id="number" placeholder="Date" name="date">
			      </div>
			      <div class="form-group">
			        <label for="number">Time</label>
			        <input type="time" class="form-control" id="number" placeholder="Time" name="time">
			      </div>
			      <div class="form-group">
			        <label for="number">Gender</label>
			        <select name="gender" id="" class="form-control">
			        	<option value="Male">Male</option>
			        	<option value="Female">Female</option>
			        </select>
			      </div>
			      <div class="form-group">
			        <label for="number">Age</label>
			        <input type="number" placeholder="Age" class="form-control" name="age">
			      </div>
			      

			      <div class="form-group">
			        <label for="number">Location</label>
			        <select name="location_id" class="form-control">
			        @foreach($location_s as $data)
	                  <option value="{{$data->id}}">{{$data->area_name}}</option>
	                @endforeach
			        </select>
			      </div>
			      <div class="form-group">
			        <label for="number">Priority</label>
			        <select name="priority" class="form-control">
			        @foreach($priority_s as $data)
	                  <option value="{{$data->id}}">{{$data->priority_name}}</option>
	                @endforeach
			        </select>
			      </div>
			      <div class="form-group">
			        <label for="number">Category</label>
			        <select name="category_id" class="form-control">
			        	
			        </select>
			      </div>
			      <div class="form-group">
			        <label for="number">Nationality</label>
			        <select name="nationality_id" class="form-control">
				    @foreach($nationality_s as $data)
	                  <option value="{{$data->id}}">{{$data->name}}</option>
	                @endforeach
			        </select>
			      </div>

			<div class="form-group">
              <label for="number">Latitude</label>
              <input type="text" class="form-control" id="number" placeholder="Latitude" name="latitude" >
            </div>
            <div class="form-group">
              <label for="number">Longitude</label>
              <input type="text" class="form-control" id="number" placeholder="Longitude" name="longitude">
            </div>
            
	           <div class="form-group">
	           	<textarea name="description" id="" cols="30" rows="10" placeholder="description" class="form-control"></textarea>
	           </div>
				    <div class="card-footer">
				      <button type="submit" class="btn btn-primary">Insert Case</button>
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