
function mostrar(){
    loadDoc(null,"scripts/alertasCamareros.php",function(){
        if (xmlhttp.readyState==4 && xmlhttp.status==200){
            document.getElementById("contenedor").innerHTML=xmlhttp.responseText;
        }
    });
}

setInterval(mostrar,1000);

function agregar(id){
    var myid=id;
    
    if(id!=""){
        loadDoc("aid="+myid,"scripts/eliminarAlerta.php",function(){
            if (xmlhttp.readyState==4 && xmlhttp.status==200){
              //  document.getElementById("contenedor").innerHTML=xmlhttp.responseText;
                
            }
        });
    }else{ 
        alert("ID no encontrada"); 
    }
    
}

