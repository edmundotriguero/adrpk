@extends("layout.admin")
@section("contenido")
<div class="container shadow p-3 mb-5 bg-white rounded">
  <h5 class="card-title col-6 d-inline">Videos list </h5> <a href="video/create" class="btn btn-outline-success"><i class="fas fa-plus-circle"></i>Nuevo</a>
</div>

<div class="container">

<div class="row mg">
    <table class="table table-hover table-sm">
  <thead>
    <tr>
      <th scope="col">Client</th>
      <th scope="col">Name</th>
      <th scope="col">Time</th>
      <th scope="col">Image</th>
      <th scope="col">Start date</th>
      <th scope="col">End date</th>
      
      {{-- <th scope="col">Description</th> --}}
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($videos as $video)
  
    <tr>
      <td>{{$video->contract->client->name}}</td>
      <td>{{$video->name}}</td>
      <td>{{$video->time}}</td>
      <td>{{$video->image}}</td>
      <td>{{$video->start_date}}</td>
      <td>{{$video->end_date}}</td>
      {{-- <td>{{$video->description}}</td> --}}
      <th>
      <a href="{{URL::action('VideoController@edit',$video->id)}}" class="ml-2"><i class="fas fa-edit"></i></a>
      <a href="" data-target="#modal-delete-{{$video->id}}" data-toggle="modal"  data-whatever="@mdo"class="ml-2"><i class="fas fa-trash-alt"></i></a>
      </th>

    </tr>  
    @include('video.modal')  
  @endforeach
    
  
  </tbody>
</table>
</div>



</div>
@endsection