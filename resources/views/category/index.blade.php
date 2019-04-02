@extends("layout.admin")
@section("contenido")
<div class="container shadow p-3 mb-5 bg-white rounded">
  <h5 class="card-title col-6 d-inline">Categories</h5> <a href="category/create" class="btn btn-outline-success"><i class="fas fa-plus-circle"></i>Nuevo</a>
</div>

<div class="container">

<div class="row mg">
    <table class="table table-hover table-sm">
  <thead>
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Description</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($categories as $category)
  
    <tr>
    
      <th>{{$category->name}}</th>
      <td>{{$category->description}}</td>
      <th>
      <a href="{{URL::action('CategoryController@edit',$category->id)}}" class="ml-2"><i class="fas fa-edit"></i></a>
      <a href="" data-target="#modal-delete-{{$category->id}}" data-toggle="modal"  data-whatever="@mdo"class="ml-2"><i class="fas fa-trash-alt"></i></a>
      </th>

    </tr>  
    @include('category.modal')  
  @endforeach
    
  
  </tbody>
</table>
</div>



</div>
@endsection