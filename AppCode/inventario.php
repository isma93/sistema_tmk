<!DOCTYPE html>
<html>
<head>
    <title>Inventario</title>
    <!-- Agrega los enlaces a los archivos de SweetAlert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
    <?php
    // Conexión base de datos
	$servidor="localhost";
	$usuario="ILP";
	$contrasena="RolsRoyceIlp24";
	$basededatos="u238990831_nota_egreso";

    // Creación de conexión
    $conn = new mysqli($localhost, $ILP, $RolsRoyceIlp24, $u238990831_nota_egreso);

    // Verifica la conexión
    if ($conn->connect_error) {
        die("La conexión falló: " . $conn->connect_error);
    }

    // Consulta para obtener los datos del inventario
    $sql = "SELECT * FROM tmk_inventarios";  
    $result = $conn->query($sql);
    ?>

    <h1>Inventario</h1>

    <table>
        <tr>
            <th>Nombre del Producto</th>
            <th>Código</th>
            <th>Cantidad</th>
            <th>Acciones</th>
        </tr>
        <?php
        // Mostrar los datos del inventario en la tabla
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>".$row['nombre_producto']."</td>";
                echo "<td>".$row['codigo']."</td>";
                echo "<td>".$row['cantidad']."</td>";
                echo "<td><a href='editar_inventario.php?id=".$row['id']."' onclick='return confirmEdit()'>Editar</a></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>No hay productos en el inventario.</td></tr>";
        }
        ?>
    </table>

    <!-- Agrega el script para mostrar la alerta de confirmación -->
    <script>
    //sweet alert
    function confirmEdit() {
        return swal({
            title: "¿Estás seguro?",
            text: "¿Quieres editar el inventario?",
            icon: "warning",
            buttons: ["Cancelar", "Editar"],
            dangerMode: true,
        })
        .then((willEdit) => {
            if (willEdit) {
                // Si el usuario elige "Editar", continúa con la acción del enlace
                return true;
            } else {
                // Si el usuario elige "Cancelar", detiene la acción del enlace
                return false;
            }
        });
    }
    </script>

    <?php
    // Cerrar la conexión a la base de datos
    $conn->close();
    ?>
</body>
</html>
