function init(){
var apiMascota = 'http://localhost/mascotas_Alpuche/public/apiMascota';

new Vue({
    http: {
        headers: {
            'X-CSRF-TOKEN': document.querySelector('#token').getAttribute('value')
        }
    },
    el:"#mascota",
    data:{
        prueba:'ESTA ES UNA PRUEBA',
        mascotas:[] //aca se va a recibir el array de las mascotas 
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
        }
    },
    //FIN DE METHODS
    
    //INICIO DE COMPUTED
    computed:{

    }
});
} window.onload = init;
