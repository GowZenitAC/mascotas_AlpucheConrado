@extends('layout.master')
@section('titulo','CRUD MASCOTAS')
@section('contenido')
    <!--INICIO DE VUE-->
    <div id="mascota">  
        <div class="row">
            <div class="col-md-12">
                <div class="card card-warning">
                    <div class="card-header">
                        <h1>CRUD MASCOTAS
                            <button class="btn btn-sm btn-primary" @click="mostrarModal()">
                            <i class="fas fa-plus"></i>
                            </button>
                        </h1>
                    </div>
                    <div class="card-body">
                        <!--Inicio de la table-->
                <table class="table table-bordered table-striped table-hover table-sm">
                    <thead>
                        <th>Nombre</th>
                        <th>Genero</th>
                        <th>Peso</th>
                        <th>Acciones</th>
                    </thead>
                    <tbody>
                        <tr v-for="mascota in mascotas">
                            <td>@{{mascota.id_mascota}}</td>
                            <td>@{{mascota.nombre}}</td>
                            <td>@{{mascota.genero}}</td>
                            <td>@{{mascota.peso}} kg</td>
                            <td>
                                <button class="btn  btn-sm"><i class="fas fa-pen"></i></button>
                                <button class="btn btn-sm" @click="eliminarMascota(mascota.id_mascota)"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <!--Fin de la table-->
                    </div>
                </div>
            </div>

        </div>
         <!-- Modal para el formulario del registro de los moovimientos -->
<div class="modal fade" id="modalMascota" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Registro de Especies</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
            <div class="form-row">
                <div class="col">
                    <input type="text" class="form-control" placeholder="nombre">
                </div>
                <div class="col">
                    <input type="text" class="form-control" placeholder="genero">
                </div>
                <div class="col">
                    <input type="text" class="form-control" placeholder="peso">
                </div>
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" @click="">Guardar</button>
      </div>
    </div>
  </div>
</div>
<!-- aqui termina el modal-->
    </div>
      <!--FIN DE VUE-->
@endsection

@push('scripts')
<script src="{{asset('js/apis/mascotas.js')}}"></script>
<script src="{{asset('js/vue-resource.js')}}"></script>
@endpush