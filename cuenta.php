<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>banner</title>
<link href="css/HTML5_thrColFixHdr.css" rel="stylesheet" type="text/css"><!--[if lt IE 9]>
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<script type="text/javascript" src="scripts/ajax.js"></script>
<script type="text/javascript">
  function pedirCamarero2(mesa){
      //alert("-"+mesa+"-");
      if(confirm("Va a pedir la cuenta")){
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
</script>

</head>

<?php
  session_start();

  include("scripts/conect.php");

  //Consulta que da todo los elemento excepto los que estan en menu
  $sql = "SELECT p.plato, p.precio FROM comandas c, mesas m, platos p WHERE p.id=c.plato AND m.id=c.mesa AND menu IS NULL AND c.mesa=". $_SESSION['_mesa'];

  //Consulta que devuelve los elementos que estan en menú
  $sql2 ="SELECT me.descripcion, p.plato, me.precio FROM comandas c, mesas m, platos p, menus me WHERE c.menu=me.id AND p.id=c.plato AND m.id=c.mesa AND menu IS NOT NULL AND p.categoria!=1 AND p.categoria!=4 AND c.mesa=". $_SESSION['_mesa'];

  //obtencion de los elementos de la comanda.
  $query1 = $mysqli->query($sql);
  //$lista1 = $query1->fetch_assoc();
  $query2 = $mysqli->query($sql2);
  //$lista2 = $query2->fetch_assoc();


  //obtención del nombre del lugar !!En el futuro esto puede ser un modulo a parte!!
  $sql3 = "SELECT nombre FROM configuracion";
  $query3 = $mysqli->query($sql3);
  $local = $query3->fetch_assoc();
  //^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^

  $cuenta=0; //total de cuenta
?>

<body>

<div class="container">

  
  <article class="content">
    <h1><?php echo $local['nombre']; ?></h1>
    <section>
      <p>
      <h2>Cuenta mesa: <?php echo $_SESSION['_mesa']?></h2>
      </p>

      <p>Platos:</p>
      <ul>
        <?php
          while ($lista1 = $query1->fetch_assoc()) {
            echo "<li>";
            echo $lista1['plato']."----".$lista1['precio']."€";
            echo "</li>";
            $cuenta+=$lista1['precio'];
          }
        ?>
      </ul>

      <p>Menus:</p>
      <ul>
        <?php
          while ($lista2 = $query2->fetch_assoc()) {
            echo "<li>";
            echo $lista2['descripcion']."----".$lista2['precio']."€";
            echo "</li>";
            $cuenta+=$lista2['precio'];
          }
        ?>
      </ul>

      <p> 
      Total:
      <?php echo $cuenta;?>
      €
      </p>

      
    </section>
  <!-- end .content --></article>

  <footer>
    <button class='bPedir' onclick='pedirCamarero2("<?php echo $_SESSION['_mesa']; ?>")'>Pedir Cuenta</button> 
  </footer>
  <!-- end .container --></div>

</body>
</html>