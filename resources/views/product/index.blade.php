@extends("layout.admin")
@section("contenido")
<div class="container shadow p-3 mb-5 bg-white rounded">
  <h5 class="card-title ">Products <a href="product/create" class="btn btn-outline-success"><i class="fas fa-plus-circle"></i></a></h5> 
  
</div>

<div class="container">


<div class="table-responsive">
    <table class="table table-hover table-sm">
  <thead>
    <tr>
      <th scope="col">location</th>
      <th scope="col">Name</th>
      <th scope="col">Place</th>
      <th scope="col">Status</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($products as $product)
  
    <tr>
      <td>{{$product->location->name}}</td>
      <td>{{$product->name}}</td>
      <td>{{$product->place}}</td>
    
      @if ($product->state == 1)
         <td> <span class="badge badge-success">ok</span></td>
      @elseif($product->state == 0)
        <td> <span class="badge badge-danger">dis</span></td>
      @endif
      
      <td>{{--
      <a href="{{URL::action('ProductController@edit',$product->id)}}" class="ml-2" <i class="fas fa-edit"></i></a>
      --}}
      <a href="" data-target="#modal-delete-{{$product->id}}" data-toggle="modal"  data-whatever="@mdo"class="ml-2"><i class="fas fa-trash-alt"></i></a>
      </td>

    </tr>  
    @include('product.modal')  
  @endforeach
    
  
  </tbody>
</table>

</div>



</div>
@endsection