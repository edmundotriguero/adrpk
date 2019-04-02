{{--<div class="modal face modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-delete-{{$prod->idproducto}}">
        {{Form::Open(array('action'=>array('ProductoController@destroy',$prod->idproducto),'method'=>'delete'))}}
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
                        <span aria-hidden="true">x</span>
                    </button>
                    <h4 class="modal-title">Eliminar Producto</h4>
                </div>
                <div class="modal-body">
                    <p>Esta Seguro de que desea Eliminar el Producto?</p>
                    <p>Esta accion no tiene retroceso</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary" >Confirmar</button>
                </div>
            </div>
        </div>
        {{Form::Close()}}
    
    </div>--}}

<div class="modal fade" id="modal-delete-{{$client->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="clients/{{$client->id}}" method="POST">
        @csrf
        @method('DELETE')
        <p>Delete record?</p>
        <p>This action has no return.</p>

          <div class="modal-footer">

        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Delete</button>
      </div>
        
        </form>
      </div>
     
    </div>
  </div>
</div>