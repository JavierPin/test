

function mostrar(){
    loadDoc(null,"scripts/listarCatalogoM.php",function(){
        if (xmlhttp.readyState==4 && xmlhttp.status==200){
            document.getElementById("contenedor").innerHTML=xmlhttp.responseText;
        }
    });
}

setInterval(mostrar,1000);


function anadir(plato){
    loadDoc("amenu="+plato,"scripts/pedirMenu.php",function(){
        if (xmlhttp.readyState==4 && xmlhttp.status==200){
            //document.getElementById("contenedor").innerHTML=xmlhttp.responseText;
        }
    });
}

