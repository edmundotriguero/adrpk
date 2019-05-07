@extends("layout.admin")
@section("contenido")
<div class="container">
<div class="pb-auto">
<h4>New Video </h4>

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

<form method="post" action="/video" autocomplete="on">
@csrf
   <div class="form-row">
   <div class="form-group col-md-6">
      <label for="contract_id">Clients</label>
      <select id="contract_id" name="contract_id" class="form-control form-control-sm" >
        <option selected value="0">Chosse...</option>
        @foreach ($contracts as $contract)
            <option value="{{$contract->id}}">{{$contract->client->name . " desde '". $contract->start_date . "' al '" . $contract->end_date."'"}}</option>
        @endforeach
      </select>
    </div>
  </div>
  <div class="form-row">
  <div class="form-group col-md-6">
   <label for="name" >Name</label>
    <input type="text" class="form-control" id="name" name="name" placeholder="Nombre" value="{{old('name')}}">
   </div>
  


  <div class="form-group col-md-6">
   <label for="time" >Time</label>
    <input type="time" class="form-control" id="time"  name="time" step="2" >
   </div>
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

  <div class="form-group row">
    <label for="description">Descripción</label>
    <textarea class="form-control" id="description" name="description" rows="3"></textarea>
  </div>
  {{-- <div class="form-row">
    <div class="form-group col-md-12">
      <label for="archivo_video">Example file input</label>
      <input type="file" class="form-control-file" id="archivo_video" name="archivo_video">
    </div>
  </div> --}}
  
    
  
  <div class="form-group row">
    <div class="col-sm-10">
      <button type="submit" class="btn btn-primary">Sign in</button>
    </div>
  </div>
</form>
</div>

@push ('scripts')
<script>
   window.onload=function() {
			 
		contract_data = $("#contract_id option:selected").text();
		if(contract_data == 'Chosse...'){
			contract_data = '';
		}
		console.log(contract_data);
	//	$("#nombreTalla").val(producto_name);

		}
    var cont = 0;
    var date_start_aux = '';
    var date_end_aux = '';
    var data_aux
    var client_name = '';

		$("#contract_id").change(function(){
      contract_id = $("#contract_id").val();
      contract_data = $("#contract_id option:selected").text();
			if(contract_data == 'Chosse...'){
			contract_data = '';
		}

			console.log(contract_id +' - ' + contract_data);
    data_aux = contract_data.split("'");
    console.log(data_aux);
    client_name = (data_aux[0]).slice(0, -7);
    date_start_aux = data_aux[1];
    date_end_aux = data_aux[3];

    $("#name").val('Spot '+client_name);
    $(time).attr('value','00:00:30');
    $(start_date).attr('value',date_start_aux);
    $(end_date).attr('value',date_end_aux);
    console.log(client_name);
    //console.log(date_end_aux);
        

	});
  //var myFile;
  //$("#archivo_video").change(function(){
  //   myFile = $('#archivo_video').prop('files');
    //nombre_archivo = $("#archivo_video").val();
  //  console.log(myFile);
  //});

  

</script>
@endpush
@endsection