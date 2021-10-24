new Vue({
    //Zona de usar de Vue
    el:"#miPagina",

    //Zona para declarar variables
    //y constantes
    data:{
        nombre:'',
        apellidoP:'',
        apellidoM:'',
        genero:'',
        editando:0,
        indice:0,
        buscar:'',
        propietarios:[{nombre:'Luis', apellidoP:'Perez', apellidoM:'Ojeda', genero:'Masculino'},
                    {nombre:'Pedro', apellidoP:'Canche', apellidoM:'Lopez', genero:'Masculino'},
                    {nombre:'Maria', apellidoP:'Mata', apellidoM:'Lozano', genero:'Femenino'},
                    {nombre:'Karla', apellidoP:'Zapata', apellidoM:'Obrador', genero:'Femenino'}],

        genero:[

                {clave:1,nombre:'Masculino'},
                {clave:1,nombre:'Femenino'},

                ],
    },

    //methods permite crear funciones/procedimientos
    methods:{

        agregarPropietario:function(){

            //se construye un objeto tipo mascota para insertar los datos en el array
            var unPropietario={nombre:this.nombre,apellidoP:this.apellidoP,apellidoM:this.apellidoM,genero:this.genero}
            //Agregamos un objeto propietario
            this.propietarios.push(unPropietario);
            this.limpiarHtml(); 

        },
        limpiarHtml:function(){
            this.nombre='';
            this.apellidoP='';
            this.apellidoM='';
            this.genero='';
        },

        eliminarPropietario:function(pos){
            var pregunta=confirm('¿Esta seguro de elimiminar?');
            if(pregunta)
            this.propietarios.splice(pos,1);
        },
        editarPropietario:function(pos){
            this.nombre=this.propietarios[pos].nombre;
            this.apellidoP=this.propietarios[pos].apellidoP;
            this.apellidoM=this.propietario[pos].apellidoM;
            this.genero=this.propietarios[pos].genero;
            this.editando=1;
            this.indice=pos;
        },
        cancelar:function(){
            this.limpiarHtml();
            this.editando=0;
        },
        //modifico los valores del array de los objetos
        guardarEdicion:function(){
            this.propietarios[this.indice].nombre=this.nombre;
            this.propietarios[this.indice].apellidoP=this.apellidoP;
            this.propietarios[this.indice].apellidoM=this.apellidoM;
            this.propietarios[this.indice].genero=this.genero;
            //limpiamos los componentes del html e indicamos que terminamos de editar, activando
            //el boton agregar/azul
            this.limpiarHtml();
            this.editando=0;
        },
        editarPropietario:function(pos){
            this.nombre=this.propietarios[pos].nombre;
            this.apellidoP=this.propietarios[pos].apellidoP;
            this.apellidoM=this.propietario[pos].apellidoM;
            this.genero=this.propietarios[pos].genero;
            this.editando=1;
            this.indice=pos;
        },

    }
})