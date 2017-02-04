<!DOCTYPE html>
 
<html lang="es">
 
<head>
<title>Bienvenido a Mi Web</title>
<meta charset="utf-8" />
<link rel="stylesheet" href="estilos.css" />
<link rel="shortcut icon" href="/favicon.ico" />
<link rel="alternate" title="Pozoler�a RSS" type="application/rss+xml" href="/feed.rss" />
</head>

<?php
  session_start();
  $_SESSION['_mesa'] = 1;
?>
 
<body>
    <header>
       <h1>Acceso a mesa</h1>
    </header>

    <section>
      <form action="cliente.php" method="post">
          Mesa número: <input type="text" name="amesa"><br>
          <input type="submit" name="aenviar" value="Entrar">          
        </form>
    </section>

    <footer>
        Creado por mi el 2017
    </footer>
</body>
</html>