@extends("layout.admin")
@section("contenido")
<div class="container shadow p-3 mb-5 bg-white rounded">
  <h5 class="card-title ">Orden de Pauta. <a href="contract/create" class="btn btn-outline-success"> <i class="fa fa-plus"></i></a></h5> 
  
</div>

<div class="container">


<div class="table-responsive">
    <table class="table table-hover table-sm">
  <thead>
    <tr>
      <th scope="col">Client</th>
      <th scope="col">Start date</th>
      <th scope="col">End date</th>
      <th scope="col">State</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($contracts as $contract)
  
    <tr>
    
      <td>{{$contract->client->name}}</td>
      <td>{{$contract->start_date}}</td>
      <td>{{$contract->end_date}}</td>
      @if ($contract->state == 1)
         <td> <span class="badge badge-success">ok</span></td>
      @elseif($contract->state == 0)
        <td> <span class="badge badge-danger">dis</span></td>
      @endif
      
      <td>
      <a href="{{URL::action('ContractController@edit',$contract->id)}}" class="ml-2"> <i class="fa fa-edit"></i></a>
     
      <a href="{{URL::action('ContractController@show',$contract->id)}}" class="ml-2"> <i class="fa fa-eye"></i></i></a>
      <a href="" data-target="#modal-delete-{{$contract->id}}" data-toggle="modal"  data-whatever="@mdo"class="ml-2"><i class="fa fa-trash-o"></i></a>
      </td>

    </tr>  
    @include('contract.modal')  
  @endforeach
    
  
  </tbody>
</table>

</div>



</div>
@endsection