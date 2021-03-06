@extends("layout.admin")
@section("contenido")

<div class="container card mt-2 shadow-sm">
  <div class="card-body">

    <div class=" row">
      <h6>Editar cliente: {{$client->name}}</h6>

    </div>



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

    <form method="POST" action="/client/{{$client->id}}" autocomplete="on">
      @csrf
      @method('put')
      <div class="form-group row">
        <label for="name">Nombre</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Nombre" value="{{$client->name}}">
      </div>
      <div class="form-group row">
        <label for="description">Descripción</label>
        <textarea class="form-control" id="description" name="description" rows="3">{{$client->description}}</textarea>
      </div>



      <div class="form-group row">
        <div class="col-sm-12">
          <button type="submit" class="btn btn-primary">Sign in</button>
        </div>
      </div>
    </form>
  </div>
</div>
@endsection