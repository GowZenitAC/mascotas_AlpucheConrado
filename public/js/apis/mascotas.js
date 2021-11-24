function init(){
var apiMascota = 'http://localhost/mascotas_Alpuche/public/apiMascota';

var apiEspecie = 'http://localhost/mascotas_Alpuche/public/apiEspecie';

new Vue({
    http: {
        headers: {
            'X-CSRF-TOKEN': document.querySelector('#token').getAttribute('value')
        }
    },
    el:"#mascota",
    data:{
        prueba:'ESTA ES UNA PRUEBA',
        mascotas:[], //aca se va a recibir el array de las mascotas 
        nombre:'',
        peso:'',
        genero:'',
        agregando:true,
        id_mascota:'',
        id_especie:'',

        cantidad:1,
        precio:0,
        buscar:''

    },
    
    created:function(){
        this.getMascotas();
    },

    //inician los metodos
    methods:{
        //funcion para obtener las mascotas a partir del array
        getMascotas:function(){
            this.$http.get(apiMascota).then(function(json){
                this.mascotas=json.data;
            })
        },
        agregarMascota:function(){
            //se construye el json para enviar al controlador
            var mascota={nombre:this.nombre,peso:this.peso,genero:this.genero};
            //se envia los datos en json
            this.$http.post(apiMascota,mascota).then(function(json){
                this.getMascotas();
                this.nombre='';
                this.peso='';
                this.genero='';
                this.id_especie='';
            }).catch(function(json){
                console.log(json);
            })
            $('#modalMascota').modal('hide');   
            console.log(mascota);
        },
        eliminarMascota:function(id){

            Swal.fire({
                title: '¿Estás seguro de eliminar?',
                text: "No podras deshacer los cambios!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, quiero eliminar!'
              }).then((result) => {
                if (result.isConfirmed) {
                    this.$http.delete(apiMascota + '/' + id).then(function(json){
                        this.getMascotas();
                    }).catch(function(json){
                        console.log(json);
                    })
                  Swal.fire(
                    'Eliminado!',
                    'Tu mascota fue eliminada.',
                    'success'
                  )
                }
              })
        },
        mostrarModal:function(){
            $('#modalMascota').modal('show');
            this.agregando=true;
            this.nombre='';
            this.genero='';
            this.peso='';
        },

       editandoMascota:function(){
           this.agregando=false;
           this.id_mascota=id;
           this.$http.get(apiMascota + '/' + id).then(function(json){
              // console.log(json.data);
              this.nombre=json.data.nombre;
              this.genero=json.data.genero;
              this.peso=json.data.peso;
           }) 
           $('#modalMascota').modal('show');
       },
       actualizarMascota:function(){
           var jsonMascota = {nombre:this.nombre,genero:this.genero,peso:this.peso, id_especie:this.id_especie};
          this.$http.patch(apiMascota + '/' + this.id_mascota, jsonMascota).then(function(json){
              this.getMascotas();       
          });   
          $('#modalMascota').modal('hide');
       },
       getEspecies:function(){
            this.$http.get(apiEspecie).then(function(json){
                this.especie=json.data;
            })
       },
       obtenerRazas(e){
            var id_especie=e.target.value;
            //console.log(id_especie);

            this.$http.get(ruta + '/getRazas/' + id_especie).then(function(json){
                
            });
       }
    },
    //FIN DE METHODS
    
    //INICIO DE COMPUTED
    computed:{
        total:function(){
            return this.cantidad * this.precio
        },
        filtroMascota:function(){
            return this.mascotas.filter((mascota)=>{
                return mascota.nombre.toLowerCase().match(this.buscar.toLowerCase().trim()) ||
                 mascota.especie.especie.toLowerCase().match(this.buscar.toLowerCase().trim())
            });
        }
    }
}); 
} window.onload = init;
