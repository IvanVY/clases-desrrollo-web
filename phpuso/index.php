<?php
include 'conexion.php';
$conexion = new Conexion();
$conn = $conexion->connectDatabase();

$edit_data = null;
if (isset($_GET['edit'])) {
    $edit_id = $_GET['edit'];
    $result = $conn->query("SELECT * FROM form WHERE id=$edit_id");
    $edit_data = $result->fetch_assoc();
}
?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>CRUD Básico</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="p-4">

    <div class="container-fluid">
        <div class="row">
            <!-- Formulario -->
            <div class="col-md-3">
                <form method="POST" action="insertar.php" enctype="multipart/form-data">



                    <h5 class="mb-3"><strong>Registro Información</strong></h5>
                    <input type="hidden" name="id" value="<?= $edit_data['id'] ?? '' ?>">
                    <div class="mb-2">
                        <label>ID</label>
                        <input type="text" class="form-control" name="id" value="<?= $edit_data['id'] ?? '' ?>"
                            readonly>
                    </div>
                    <div class="mb-2">
                        <label>Nombre</label>
                        <input type="text" class="form-control" name="nombre" value="<?= $edit_data['nombre'] ?? '' ?>"
                            required>
                    </div>
                    <div class="mb-2">
                        <label>Apellido</label>
                        <input type="text" class="form-control" name="apellido"
                            value="<?= $edit_data['apellido'] ?? '' ?>" required>
                    </div>
                    <div class="mb-2">
                        <label>Edad</label>
                        <input type="number" class="form-control" name="edad" value="<?= $edit_data['edad'] ?? '' ?>"
                            required>
                    </div>
                    <div class="mb-2">
                        <label>Ciudad</label>
                        <input type="text" class="form-control" name="ciudad" value="<?= $edit_data['ciudad'] ?? '' ?>"
                            required>
                    </div>
                    <button class="btn btn-success" name="insert">Insertar</button>
                    <button class="btn btn-primary" name="update">Actualizar</button>
                </form>
            </div>

            <!-- Tabla -->
            <div class="col-md-9">
                <table class="table table-bordered text-center">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Edad</th>
                            <th>Ciudad</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        include_once 'recuperarDatos.php';
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['nombre']}</td>
                        <td>{$row['apellido']}</td>
                        <td>{$row['edad']}</td>
                        <td>{$row['ciudad']}</td>
                        <td>
                            <a href='index.php?edit={$row['id']}' class='text-warning me-2'>&#9998;</a>
                            <a href='insertar.php?delete={$row['id']}' class='text-danger' onclick='return confirm(\"¿Eliminar este registro?\")'>&#128465;</a>
                        </td>
                    </tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <p ></p>
</body>

</html>