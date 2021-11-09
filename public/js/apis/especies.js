
function init(){

var apiEspecie = 'http://localhost/mascotas_Alpuche/public/apiEspecie';

new Vue({
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
        getEspecies:function(){
            this.$http.get(apiEspecie).then(function(json){
                this.especies=json.data;
            })
        }
    },
    //FIN DE METHODS
    computed:{

    }
})
} window.onload = init;