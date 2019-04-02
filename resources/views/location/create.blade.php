@extends("layout.admin")
@section("contenido")
<div class="container">
<div class="pb-auto">
<h4>New location </h4>

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

<form method="post" action="/location" autocomplete="on">
@csrf
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="name">Name</label>
      <input type="text" class="form-control" id="name" name="name" placeholder="Name location">
    </div>
   
  </div>
  <div class="form-group">
    <label for="address">Address</label>
    <input type="text" class="form-control" id="address" name="address" placeholder="1234 Main St">
  </div>
   <div class="form-group">
    <label for="image">Image</label>
    <input type="file" class="form-control-file" id="image" name="image">
  </div>

  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="start_date">Start date</label>
      <input type="date" class="form-control" id="start_date" name="start_date">
    </div>
    
    <div class="form-group col-md-6">
      <label for="end_date">End date</label>
      <input type="date" class="form-control" id="end_date" name="end_date">
    </div>
  </div>
  <div class="form-group ">
    <label for="description">Description</label>
    <textarea class="form-control" id="description" name="description" rows="3"></textarea>
  </div>
  <button type="submit" class="btn btn-primary">Sign in</button>
</form>
</div>
@endsection