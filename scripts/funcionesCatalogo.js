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
    var categoria = getGET();
    loadDoc("acategoria="+categoria,"scripts/listarCatalogo.php",function(){
        if (xmlhttp.readyState==4 && xmlhttp.status==200){
            document.getElementById("contenedor").innerHTML=xmlhttp.responseText;
        }
    });
}

setInterval(mostrar,1000);


function anadir(plato,categoria){
    var categoria = getGET();
    loadDoc("aplato="+plato+"&acategoria="+categoria,"scripts/pedirPlato.php",function(){
        if (xmlhttp.readyState==4 && xmlhttp.status==200){
            //document.getElementById("contenedor").innerHTML=xmlhttp.responseText;
        }
    });
}

