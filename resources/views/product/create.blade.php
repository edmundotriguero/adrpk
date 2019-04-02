@extends("layout.admin")
@section("contenido")
<div class="container">
<div class="pb-auto">
<h4>New Product </h4>

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

<form method="post" action="/product" autocomplete="on">
@csrf
  <div class="form-row">
   <div class="form-group col-md-6">
      <label for="category_id">Category</label>
      <select id="category_id" name="category_id" class="form-control form-control-sm" >
        <option selected>Choose...</option>
        @foreach ($categories as $category)
            <option value="{{$category->id}}">{{$category->name}}</option>
        @endforeach
      </select>
    </div>
     <div class="form-group col-md-6">
      <label for="location_id">Location</label>
      <select id="location_id" name="location_id" class="form-control form-control-sm">
        <option selected>Choose...</option>
        @foreach ($locations as $location)
            <option value="{{$location->id}}">{{$location->name}}</option>
        @endforeach
        
      </select>
    </div>
   
  </div>

  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="name">Name</label>
      <input type="text" class="form-control form-control-sm" id="name" name="name" placeholder="Name product "value="{{old('name')}}">
    </div>
   
  </div>
  <div class="form-group">
    <label for="place">Place</label>
    <input type="text" class="form-control form-control-sm" id="place" name="place" placeholder="pilares" value="{{old('place')}}">
  </div>
   <div class="form-group">
    <label for="image">Image</label>
    <input type="file" class="form-control-file form-control-sm" id="image" name="image" value="{{old('image')}}">
  </div>

  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="start_date">Start date</label>
      <input type="date" class="form-control form-control-sm" id="start_date" name="start_date" value="{{old('start_date')}}">
    </div>
    
    <div class="form-group col-md-6">
      <label for="end_date">End date</label>
      <input type="date" class="form-control form-control-sm" id="end_date" name="end_date" value="{{old('start_date')}}">
    </div>
  </div>
  <div class="form-group ">
    <label for="description">Description</label>
    <textarea class="form-control form-control-sm" id="description" name="description" rows="3">{{old('description')}}</textarea>
  </div>
  <button type="submit" class="btn btn-primary">Sign in</button>
</form>
</div>
@endsection