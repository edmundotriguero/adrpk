@extends("layout.admin")
@section("contenido")
<div class="container">
<div class=" row">
<h6>Location: {{$location->name}}</h6>

</div>
</div>
<div class="container">
@if($errors->any())
<div >
     <ul>
         @foreach($errors->all() as $error)
             <li class="alert alert-warning alert-dismissible fade show" role="alert">{{ $error }}<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button></li>
             
        @endforeach
     </ul>
</div>
@endif

<form method="POST" action="/location/{{$location->id}}" autocomplete="on">
@csrf
@method('put')
   <div class="form-row">
    <div class="form-group col-md-6">
      <label for="name">Name</label>
      <input type="text" class="form-control" id="name" name="name" placeholder="Name location" value="{{$location->name}}">
    </div>
   
  </div>
  <div class="form-group">
    <label for="address">Address</label>
    <input type="text" class="form-control" id="address" name="address" placeholder="1234 Main St" value="{{$location->address}}">
  </div>
   <div class="form-group">
    <label for="image">Image</label>
    <input type="file" class="form-control-file" id="image" name="image" value="{{$location->image}}">
  </div>

  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="start_date">Start date</label>
      <input type="date" class="form-control" id="start_date" name="start_date" value="{{$location->start_date}}">
    </div>
    
    <div class="form-group col-md-6">
      <label for="end_date">End date</label>
      <input type="date" class="form-control" id="end_date" name="end_date" value="{{$location->end_date}}">
    </div>
  </div>
  <div class="custom-control custom-switch">
  <input type="checkbox" class="custom-control-input" id="state" name="state" checked>
  <label class="custom-control-label" for="state">Enable and disable state</label>
</div>
  <div class="form-group ">
    <label for="description">Description</label>
    <textarea class="form-control" id="description" name="description" rows="3">{{$location->description}}</textarea>
  </div>

  
    
  
  <div class="form-group row">
    <div class="col-sm-10">
      <button type="submit" class="btn btn-primary">Sign in</button>
    </div>
  </div>
</form>
</div>
@endsection