@extends('master')

@section('content')
<div class="panel panel-widget forms-panel">
		<div class="forms">
			<div class="form-grids widget-shadow" data-example-id="basic-forms"> 
				<div class="form-title">
					<h4>Edit Role</h4>
				</div>
				<div class="form-body">
					<form method="POST" action="{{url('/')}}">
						{{ csrf_field() }}
						
						<div class="form-group"> 
							<label for="name">Name</label> 
							<input name="name" type="text" class="form-control" id="name" value="{{$role->name}}"> 
						</div>	
						<div class="form-group"> 
							<label for="slug">Slug</label> 
							<input name="slug" type="text" class="form-control" id="slug" value="{{$role->slug}}"> 
						</div>			
						<button type="submit" class="btn btn-default">Save</button>
					</form> 
				</div>
			</div>
		</div>
	</div>

@include('partials.footer')
@endsection


