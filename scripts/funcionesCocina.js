
function mostrar(){
    loadDoc(null,"scripts/mensaje.php",function(){
        if (xmlhttp.readyState==4 && xmlhttp.status==200){
            document.getElementById("contenedor").innerHTML=xmlhttp.responseText;
        }
    });
}

setInterval(mostrar,1000);

function agregar(id,estado){
    var myid=id;
    var myestado=estado;
    
    if(id!="" && estado!=""){
        loadDoc("aid="+myid+"&aestado="+myestado,"scripts/enviar.php",function(){
            if (xmlhttp.readyState==4 && xmlhttp.status==200){
              //  document.getElementById("contenedor").innerHTML=xmlhttp.responseText;
                
            }
        });
    }else{ 
        alert("ID no encontrada"); 
    }
    
}

//----------------------------------------------------------------------------------------------
//---------------------------vvvv funciones de drop vvvv----------------------------------------
//----------------------------------------------------------------------------------------------

function empezar(e){
	e.dataTransfer.effectAllowed = 'move';
    e.dataTransfer.setData("Data", e.target.getAttribute('id'));
    e.dataTransfer.setDragImage(e.target, 0, 0);
    return true;                
}


function enter(e){
    return true;
}

function over(e){
	var esarrastrable = e.dataTransfer.getData("Data");
	var id = e.target.getAttribute('id');
	/*if (id == 'destino1') 
        return false;
	if ((id == 'destino2') && esarrastrable == 'arrastrable3') 
        return false;
	else 
        if (id == 'destino3' && (esarrastrable == 'arrastrable1' || esarrastrable == 		                        'arrastrable2')) 
            return false;
		else 
            return true;			
    */
    if(id == 'espera' || id == 'proceso' || id == 'terminado'){
        return false;
    }else{
        return true;
    }


}

function drop(e){
    var esarrastrable = e.dataTransfer.getData("Data");
    var estado = e.target.getAttribute('id');
	e.target.appendChild(document.getElementById(esarrastrable));
	e.stopPropagation();
    agregar(esarrastrable,estado);
    return false;
}

function end(e){
    e.dataTransfer.clearData("Data");
    return true
}