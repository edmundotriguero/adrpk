@extends("layout.admin")
@section("contenido")
<div class="container">
  <div class="pb-auto">
    <h4>New Contract </h4>

  </div>
</div>
<div class="container">


  @if($errors->any())
  <div>
    <ul>
      @foreach($errors->all() as $error)
      <li class="alert alert-warning alert-dismissible fade show" role="alert">{{ $error }}<button type="button"
          class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button></li>

      @endforeach
    </ul>
  </div>
  @endif

  <form method="post" action="/contract" autocomplete="on">
    @csrf
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="client_id">Clients</label>
        <select id="client_id" name="client_id" class="form-control form-control-sm">
          <option selected value="0">Choose...</option>
          @foreach ($clients as $client)
          <option value="{{$client->id}}">{{$client->name}}</option>
          @endforeach
        </select>
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="start_date">Start date</label>
        <input type="date" class="form-control form-control-sm" id="start_date" name="start_date"
          value="{{old('start_date')}}">
      </div>

      <div class="form-group col-md-6">
        <label for="end_date">End date</label>
        <input type="date" class="form-control form-control-sm" id="end_date" name="end_date"
          value="{{old('start_date')}}">
      </div>
    </div>

    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="product_id">Products</label>
        <select id="product_id" name="product_id" class="form-control form-control-sm">
          <option selected value="">Choose...</option>
          @foreach ($products as $product)
          <option value="{{$product->id}}">{{$product->location->name." - ".$product->name}}</option>
          @endforeach
        </select>
      </div>

      <div class="form-group col-md-6">
        <table class="table table-sm" id="detalles">
          <thead>
            <tr>
              <td><label for="product_id">Products asignet</label></td>
            </tr>
          </thead>
          <tbody>


          </tbody>
        </table>
      </div>
    </div>



    <div class="form-group ">
      <label for="description">Description</label>
      <textarea class="form-control form-control-sm" id="description" name="description"
        rows="3">{{old('description')}}</textarea>
    </div>
    <button type="submit" class="btn btn-primary">Sign in</button>
  </form>
</div>

@push ('scripts')
<script>
  window.onload=function() {
			 
		producto_name = $("#product_id option:selected").text();
		if(producto_name == 'Chosse...'){
			producto_name = '';
		}
		console.log(producto_name);
		$("#nombreTalla").val(producto_name);

		}
    var cont = 0;
		$("#product_id").change(function(){
      producto_id = $("#product_id").val();
      producto_name = $("#product_id option:selected").text();
			if(producto_name == 'Chosse...'){
			producto_name = '';
		}

			console.log(producto_id +' - ' + producto_name);
			
      	

        var fila='<tr class="" id="fila'+cont+'">'+
            '<td>'+
            '<button type="button" class="btn btn-outline-primary btn-sm"  onclick="eliminar('+cont+');" >X</button>'+
            ' <input type="hidden" name="product_list[]" value="'+producto_id+'"> '+producto_name+' </td>'+
            '</tr>';
            cont++;
            
          
            $('#detalles').append(fila);

	});

  function eliminar(index){   
        $("#fila"+index).remove();
    }

</script>

@endpush
@endsection