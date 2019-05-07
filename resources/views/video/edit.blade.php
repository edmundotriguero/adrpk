@extends("layout.admin")
@section("contenido")
<div class="container">
<div class=" row">
<h6>Video: {{$video->name}}</h6>

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

<form method="POST" action="/video/{{$video->id}}" autocomplete="on">
@csrf
@method('put')

<div class="form-row">
   <div class="form-group col-md-6">
      <label for="contract_id">Clients</label>
      <select id="contract_id" name="contract_id" class="form-control form-control-sm" >
        <option selected value="0">Chosse...</option>
        @foreach ($contracts as $contract)
          @if ($video->contract_id == $contract->id)
              <option value="{{$contract->id}}" selected>{{$contract->client->name . " desde '". $contract->start_date . "' al '" . $contract->end_date."'"}}</option>
          @else
              <option value="{{$contract->id}}">{{$contract->client->name . " desde '". $contract->start_date . "' al '" . $contract->end_date."'"}}</option>
          @endif
        @endforeach
      </select>
    </div>
  </div>
  <div class="form-row">
  <div class="form-group col-md-6">
   <label for="name" >Name</label>
    <input type="text" class="form-control" id="name" name="name" placeholder="Nombre" value="{{$video->name}}">
   </div>
  


  <div class="form-group col-md-6">
   <label for="time" >Time</label>
    <input type="time" class="form-control" id="time"  name="time" step="2" value="{{$video->time}}" >
   </div>
  </div>

  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="start_date">Start date</label>
      <input type="date" class="form-control form-control-sm" id="start_date" name="start_date" value="{{$video->start_date}}">
    </div>
    
    <div class="form-group col-md-6">
      <label for="end_date">End date</label>
      <input type="date" class="form-control form-control-sm" id="end_date" name="end_date" value="{{$video->end_date}}">
    </div>
  </div>

  <div class="form-group row">
    <label for="description">Descripción</label>
    <textarea class="form-control" id="description" name="description" rows="3" > {{$video->description}}</textarea>
  </div>
  
    
  
  <div class="form-group row">
    <div class="col-sm-10">
      <button type="submit" class="btn btn-primary">Sign in</button>
    </div>
  </div>
</form>
</div>
@endsection