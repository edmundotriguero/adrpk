@extends("layout.admin")
@section("contenido")


<div class="container shadow p-3 mb-3 bg-white rounded">
  <h5 class="card-title col-6 d-inline">Clientes</h5> <a href="client/create" class="btn btn-outline-success"><i
      class="fas fa-plus-circle"></i>Nuevo</a>
</div>

<div class="container card mt-2 shadow-sm">
  <div class="card-body">

    <table class="table table-hover table-sm">
      <thead>
        <tr>
          <th scope="col">Name</th>
          <th scope="col">Description</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($clients as $client)
        <tr>
          <td>{{$client->name}}</th>
          <td>{{$client->description}}</td>
          <th>
            <a href="{{URL::action('ClientController@edit',$client->id)}}" class="ml-2"><i class="fa fa-pencil-square-o"></i></a>
            <a href="" data-target="#modal-delete-{{$client->id}}" data-toggle="modal" data-whatever="@mdo"
              class="ml-2"><i class="fa fa-trash-o"></i></a>
          </th>
        </tr>
        @include('client.modal')
        @endforeach
      </tbody>
    </table>
  </div>
  {{-- </div> --}}
</div>
</div>


@endsection