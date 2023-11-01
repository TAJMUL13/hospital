{{-- Extends the Master file--}}
@extends('../master')
{{-- Title--}}
@section('title','Add New Nationality')
{{-- heading content --}}
@section('heading','Add New Nationality')
{{-- Main content--}}
@section('main_content')
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- Default box -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Add New Nationality</h3>

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
				<form  method="POST" action="/nationality/store">
					@csrf
					<div class="form-group">
						<label for="contact_name">Nationality Name</label>
						<input type="text" class="form-control" id="contact_name" placeholder="Nationality Name" name="name">
					</div>
			      <div class="form-group">
			        <label for="number">Nationality Code</label>
			        <input type="text" class="form-control" id="number" placeholder="Nationality Code" name="code">
			      </div>
           
				    <div class="card-footer">
				      <button type="submit" class="btn btn-primary">Create Nationality</button>
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