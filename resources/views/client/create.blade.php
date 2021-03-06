@extends("layout.admin")
@section("contenido")

<div class="container card mt-2 shadow-sm">
  <div class="card-body">


    <div class="pb-auto">
      <h4>Nuevo Cliente </h4>

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
          </button>
        </li>

        @endforeach
      </ul>
    </div>
    @endif

    <form method="post" action="/client" autocomplete="on">
      @csrf
      <div class="form-group row">
        <label for="name" >Nombre</label>
          <input type="text" class="form-control" id="name" name="name" placeholder="Nombre">
      </div>
      
      <div class="form-group row">
        <label for="description" >Descripción</label>
        <textarea class="form-control" id="description" name="description" rows="3"></textarea>
      </div>

      <div class="form-group row text-center">
        <div class="col-sm-12">
          <button type="submit" class="btn btn-outline-primary">Sign in</button>
          <a href="{{action('ClientController@index')}}" class="btn btn-outline-danger" role="button" tabindex="-1" aria-hidden="true">Back</a>
        </div>
      </div>
    </form>
  </div>
</div>



@endsection