
function init(){

    var apiProducto = 'http://localhost/mascotas_Alpuche/public/apiProducto';
    
    new Vue({
        //Asignamos el token
        http: {
            headers: {
                'X-CSRF-TOKEN': document.querySelector('#token').getAttribute('value')
            }
        },
        el:'#apiVenta',
    
        data:{
            mensaje:'HOLA MUNDO CRUEL',
            sku:'',
            ventas:[],
            productos:[],
            cantidades:[1,1,1,1,1,1,1,1,1,1],
            auxSubTotal:0,
    
        },
    
        //INICIO DE METHODS
        methods:{
            
            buscarProducto:function(){

                if(this.sku){
                var producto = {}
                this.$http.get(apiProducto + '/' + this.sku).then(function(json){
                    producto = {
                        sku:json.data.sku,
                        nombre:json.data.nombre,
                        precio_venta:json.data.precio_venta,
                        cantidad:1,
                        total:json.data.precio_venta,

                    };
                    this.ventas.push(producto);
                    this.sku='';
                })
            }
            }

        },
        //FIN DE METHODS
        computed:{
            
            totalProducto:function(){
                return (id)=>{
                    var total = 0;
                    total = this.ventas[id].precio_venta*this.cantidades[id];
                    
                    //Actualizo el total del producto en el array ventas
                    this.ventas[id].total=total;
                    //actualizo la cantidad en el array ventas
                    this.ventas[id].cantidad=this.cantidades[id]
                    return total.toFixed(1);
                }
            },
            subTotal:function(){
                var total=0;

                for (var i = this.ventas.length - 1; i >= 0; i--) {
                    total=total+this.ventas[i].total;
                }
                //mando una copia del subtotal a la seccion del data 
                //para el uso de otros calculos
                this.auxSubTotal=total.toFixed(1);
                return total.toFixed(1);
            },
            iva:function(){
              var auxIva=0;
              auxIva = this.auxSubTotal * 0.16;
              //mando una copia del iva a la seccion del data 
                //para el uso de otros calculos
              return auxIva.toFixed(1);
            },
            sumaTotal:function(){
                var auxTotal=0;
                auxTotal=this.auxSubTotal*1.16;
                return auxTotal.toFixed(1);
            },
            noArticulos:function(){
                var acum=0;
                for (var i = this.ventas.length - 1; i >= 0; i--) {
                    acum=acum+this.ventas[i].cantidad;
                    
                }
                return acum;
            }
        }
    })
    } window.onload = init;