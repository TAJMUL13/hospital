{{-- Extends the Master file--}}
@extends('../master')
{{-- Title--}}
@section('title','Add New Priority')
{{-- heading content --}}
@section('heading','Add New Priority')
{{-- Main content--}}
@section('main_content')
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- Default box -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Add New Priority</h3>

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
				<form  method="POST" action="/priority/store">
					@csrf
					<div class="form-group">
						<label for="contact_name">Priority Name</label>
						<input type="text" class="form-control" id="contact_name" placeholder="Priority name" name="priority_name">
					</div>
			      <div class="form-group">
			        <label for="number">Priority Code</label>
			        <input type="text" class="form-control" id="number" placeholder="Priority Code" name="priority_code">
			      </div>
           
				    <div class="card-footer">
				      <button type="submit" class="btn btn-primary">Create Priority</button>
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