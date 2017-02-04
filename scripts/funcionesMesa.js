function getGET(){
    // capturamos la url
    var loc = document.location.href;
    // si existe el interrogante
    if(loc.indexOf('?')>0){

        // cogemos la parte de la url que hay despues del interrogante

        var getString = loc.split('?')[1];

        // obtenemos un array con cada clave=valor

        var GET = getString.split('&');

        var get = {};

        // recorremos todo el array de valores

        for(var i = 0, l = GET.length; i < l; i++){

            var tmp = GET[i].split('=');

            get[tmp[0]] = unescape(decodeURI(tmp[1]));
        }
        return get[tmp[0]];
    }
}

function mostrar(){
    var mesa = getGET();
    loadDoc("aid="+mesa,"scripts/alertasMesa.php",function(){
        if (xmlhttp.readyState==4 && xmlhttp.status==200){
            document.getElementById("contenedor").innerHTML=xmlhttp.responseText;
        }
    });
}

setInterval(mostrar,1000);

function eliminar(id){
    var myid=id;
    //alert(myid);
    if(myid!=""){
        loadDoc("aid="+myid,"scripts/eliminarMesa.php",function(){
            if (xmlhttp.readyState==4 && xmlhttp.status==200){
              //  document.getElementById("contenedor").innerHTML=xmlhttp.responseText;
                
            }
        });
    }else{ 
        alert("Comanda no encontrada"); 
    }
    
}

function pedirCamarero(){

    if (confirm("¿Quiere pedir ayuda a un camarero?")){
        var mesa = getGET();
        //alert("-"+mesa+"-");
        if(mesa!=""){
            loadDoc("amesa="+mesa,"scripts/pedirCamarero.php",function(){
                if (xmlhttp.readyState==4 && xmlhttp.status==200){
                    //document.getElementById("camareros").innerHTML=xmlhttp.responseText;
                    
                }
            });
        }else{ 
            alert("Comanda no encontrada"); 
        }
    }
    
}