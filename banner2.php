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
  function mostrar(){
    var mesa = 0;
    mesa = document.getElementById("mesa").innerHTML;
    //alert(mesa);

      loadDoc("amesa="+mesa,"scripts/resumen.php",function(){
          if (xmlhttp.readyState==4 && xmlhttp.status==200){
              document.getElementById("contenedor").innerHTML=xmlhttp.responseText;
          }

      });
  }

  setInterval(mostrar,3000);
</script>
</head>

<?php

session_start();

$mesa=null;
if(isset($_SESSION['_mesa'])) {
    $mesa = $_SESSION['_mesa'];
} else {
    $mesa = 1;
}

?>

<body>

<div class="container" id=contenedor>
<div id=mesa value=<?php echo($mesa); ?> hidden="true">
  <?php echo $mesa; ?>
</div>
  <header>
  <div style="float:left">
    <a href="#"><img src="recursos/logo.png" alt="Logo" width="180" height="90" id="Insert_logo" style="background-color: #C6D580; display:block;" /></a>
  </div>
    
  <div id=mesa style="float:right">
    <p>Mesa:  Cargando...</p>
    <hr>
    <p>Cuenta:
    Cargando...</p>
  </div>
    
  </header>
  <!-- end .container --></div>
</body>
</html>
