{{-- Extends the Master file--}}
@extends('../master')
{{-- Title--}}
@section('title','Edit priority')
{{-- heading content --}}
@section('heading','Edit priority')
{{-- Main content--}}
@section('main_content')
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- Default box -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Edit Priority</h3>

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
				<form  method="POST" action="/priority/update/{{$datas->id}}">
					@csrf
					<div class="form-group">
						<label for="contact_name">Area Name</label>
						<input type="text" class="form-control" id="contact_name" placeholder="Area Name" name="priority_name" value="{{$datas->priority_name}}">
					</div>
			      <div class="form-group">
			        <label for="number">Area Code</label>
			        <input type="text" class="form-control" id="number" placeholder="Area Code" name="priority_code" value="{{$datas->priority_code}}">
			      </div>
           
				    <div class="card-footer">
				      <button type="submit" class="btn btn-primary">Update Priority</button>
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