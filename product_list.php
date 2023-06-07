<?php
  // Obtén los valores de sesión almacenados anteriormente
  $i = 0; // Inicializa la variable de contador
?>

<!DOCTYPE html>
<html>
<head>
  <title>Lista de Productos</title>
</head>
<body>
  <h1>Lista de Productos</h1>

  <table>
    <tr>
      <th>Marca</th>
      <th>ID</th>
      <th>Nombre</th>
    </tr>

    <?php while (isset($_SESSION['marca_producto'.$i])) : ?>
      <tr>
        <td><?php echo $_SESSION['marca_producto'.$i]; ?></td>
        <td><?php echo $_SESSION['id_producto'.$i]; ?></td>
        <td><?php echo $_SESSION['nombre_producto'.$i]; ?></td>
      </tr>

      <?php $i++; ?>
    <?php endwhile; ?>
  </table>
</body>
</html>
