@extends("layout.admin")
@section("contenido")
<div class="container shadow p-3 mb-5 bg-white rounded">
  <h5 class="card-title ">Locations <a href="location/create" class="btn btn-outline-success">
    <i class="fas fa-plus-circle"></i></a></h5>

</div>

<div class="container">


  <div class="table-responsive">

    <table class="table table-hover table-sm">
      <thead>
        <tr>
          <th scope="col">Name</th>
          <th scope="col">Address</th>

          <th scope="col">Status</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($locations as $location)

        <tr>

          <td>{{$location->name}}</td>
          <td>{{$location->address}}</td>

          @if ($location->state == 1)
          <td> <span class="badge badge-success">ok</span></td>
          @elseif($location->state == 0)
          <td> <span class="badge badge-danger">dis</span></td>
          @endif

          <td>
            <a href="{{URL::action('LocationController@edit',$location->id)}}" class="ml-2"><i
                class="fa fa-pencil-square-o"></i></a>
            <a href="" data-target="#modal-delete-{{$location->id}}" data-toggle="modal" data-whatever="@mdo"
              class="ml-2"><i class="fa fa-trash-o"></i></a>
          </td>

        </tr>
        @include('location.modal')
        @endforeach


      </tbody>
    </table>

  </div>



</div>
@endsection