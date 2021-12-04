@extends('layout.master')
@section('titulo','CRUD MASCOTAS')
@section('contenido')
    <!--INICIO DE VUE-->
    <div id="mascota">  
      <!--<div class="row">
        <div class="col-md-8">
          <input type="number" placeholder="cantidad" class="form-control" v-model="cantidad"><br>
          <input type="number" placeholder="precio" class="form-control" v-model="precio">
          <h5>TOTAL: @{{total}}</h5>
        </div>
      </div>-->
      
        <div class="row">
            <div class="col-md-12">
                <div class="card card-warning">
                    <div class="card-header">
                        <h1>CRUD MASCOTAS
                            <button class="btn btn-sm btn-primary" @click="mostrarModal()">
                            <i class="fas fa-plus"></i>
                            </button>
                        </h1>
                        <div class="col-md-3">
                        <input type="text" placeholder="Escriba el nombre de la mascota" class="form-control" 
                        v-model="buscar"> 
                      </div>
                    </div>
                    <div class="card-body">
                        <!--Inicio de la table-->
                <table class="table table-bordered table-striped table-hover table-sm">
                    <thead>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Genero</th>
                        <th>Peso</th>
                        <th>Especie</th>
                        <th>Acciones</th>
                    </thead>
                    <tbody>
                        <tr v-for="mascota in filtroMascota">
                            <td>@{{mascota.id_mascota}}</td>
                            <td>@{{mascota.nombre}}</td>
                            <td>@{{mascota.genero}}</td>
                            <td>@{{mascota.peso}} kg</td>
                            <td>@{{mascota.especie.especie}}</td>
                            <td>
                                <button class="btn  btn-sm" @clicl=editandoMascota(mascota.id_mascota)><i class="fas fa-pen"></i></button>
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
        <h5 class="modal-title" id="exampleModalLabel" v-if="agregando==true">Registro Mascota</h5>
        <h5 class="modal-title" id="exampleModalLabel" v-if="agregando==false">Editando Mascota</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <input type="text" class="form-control" placeholder="Nombre de mascota" v-model="nombre"><br>
        <input type="number" class="form-control" placeholder="Escriba el peso" v-model="peso"><br>
        <select class="form-control" v-model="genero">
            <option disabled="">Elije un genero</option>
            <option value="M">M</option>
            <option value="H">H</option>
        </select><br>

        <select name="" id="" class="form-control" v-model="id_especie" @change="obtenerRazas">
          <option value="" v-for="especie in especies" v-bind:value="especie.id_especie">
            @{{especie.especie}}
          </option>
        </select><br>

        <select class="form-control" v-model="id_raza">
          <option value="" disbled="">Selecciona una raza</option>
          <option value="" v-for="raza in razas" v-bind:value="id_raza">@{{raza.raza}}</option>
        </select>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" @click="agregarMascota" v-if="agregando==true">Guardar</button>
        <button type="button" class="btn btn-primary" @click="actualizarMascota()" v-if="agregando==false">Editar</button>
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