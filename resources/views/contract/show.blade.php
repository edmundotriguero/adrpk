@extends("layout.admin")
@section("contenido")
<div class="container">
<div class="pb-auto">
<h4>Contract </h4>

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

<form method="post" action="/contract" autocomplete="on">
@csrf
  <div class="card">
  <div class="card-header">
   <h6>Client: {{$contract->client->name}}</h6> 
  </div>
  <div class="card-body">
    
      <p class="card-text">Start date: {{$contract->start_date}}</p>
      <p class="card-text ">End date: {{$contract->end_date}}</p>
      
        <div class=" col-md-7">
          <table class="table table-sm" id="detalles">
            <thead>
              <tr>
                <th >Products asignet:</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($contract->products as $product)
              <tr>
                <td >{{$product->location->name." - ".$product->name}}</td>  
             </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      
      <footer class="blockquote-footer">Description: <cite title="Source Title">{{$contract->description}}</cite></footer>
    
  </div>
</div>
  

  

  
</form>
</div>
@endsection