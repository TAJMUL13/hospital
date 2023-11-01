{{-- Extends the Master file--}}
@extends('../master')
{{-- Title--}}
@section('title','Create Category')
{{-- heading content --}}
@section('heading','Add New Category')
{{-- Main content--}}
@section('main_content')
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- Default box -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Add New Category</h3>

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
				<form  method="POST" action="/category/store">
					@csrf
					<div class="form-group">
						<label for="contact_name">Category Name</label>
						<input type="text" class="form-control" id="contact_name" placeholder="Category Name" name="category_name">
					</div>
			      <div class="form-group">
			        <label for="number">Category Code</label>
			        <input type="text" class="form-control" id="number" placeholder="Category code" name="category_code">
			      </div>
            <div class="form-group">
              <label for="number">Priority id</label>
              <select name="priority_id" id="" class="form-control">
                @foreach($datas as $data)
                  <option value="{{$data->id}}">{{$data->id}}</option>
                @endforeach
              </select>
            </div>

             <div class="form-group">
              <label for="number">Priority Name</label>
              <select name="priority_name" id="" class="form-control">
                @foreach($datas as $data)
                  <option value="{{$data->priority_name}}">{{$data->priority_name}}</option>
                @endforeach
              </select>
            </div>
				    <div class="card-footer">
				      <button type="submit" class="btn btn-primary">Create Category</button>
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