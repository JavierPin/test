<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>banner</title>
<link href="css/HTML5_thrColFixHdr.css" rel="stylesheet" type="text/css"><!--[if lt IE 9]>
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
</head>

<?php
  session_start();
?>

<body>

<div class="container">
  <header>
    
    <div class="fltcent">
    <nav class="top_menu">
      <ul>
          <li><a href= <?php echo "'mesa.html?aid=".$_SESSION['_mesa']."'";  ?> target="opcion"><img src="recursos/mesa1.png" alt="Logo" width="60" height="40" id="Insert_logo" style="background-color: #C6D580; display:block;" /></a></li>

          <li><a href="platos.php" target="opcion"><img src="recursos/plato.jpg" alt="Logo" width="60" height="40" id="Insert_logo" style="background-color: #C6D580; display:block;" /></a></li>

          <li><a href="cuenta.php" target="opcion"><img src="recursos/cuenta.jpg" alt="Logo" width="60" height="40" id="Insert_logo" style="background-color: #C6D580; display:block;" /></a></li>
      </ul>
    </nav>
    </div>

  </header>
  <!-- end .container --></div>
</body>
</html>