
function init(){

var apiEspecie = 'http://localhost/mascotas_Alpuche/public/apiEspecie';

new Vue({
    //Asignamos el token
    http: {
        headers: {
            'X-CSRF-TOKEN': document.querySelector('#token').getAttribute('value')
        }
    },
    el:'#apiEspecies',

    data:{
        mensaje:'HOLA MUNDO CRUEL',
        especies:[]

    },

    //se ejecuta automaticamente cuando la pagina se crea
    created:function(){
        this.getEspecies();
    },

    //INICIO DE METHODS
    methods:{
        //obtiene el listado de todas las especies
        getEspecies:function(){
            this.$http.get(apiEspecie).then(function(json){
                this.especies=json.data;
            })
        },
        eliminarEspecie:function(id){
            this.$http.delete(apiEspecie + '/' + id).then(function(json){
                this.getEspecies();
            }).catch(function(json){
                console.log(json);
            })
        }
    },
    //FIN DE METHODS
    computed:{

    }
})
} window.onload = init;