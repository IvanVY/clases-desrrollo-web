<?php
include 'conexion.php';

$conexion = new Conexion();
$conn = $conexion->connectDatabase();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $edad = $_POST['edad'];
    $ciudad = $_POST['ciudad'];

    if (!empty($nombre) && !empty($apellido) && !empty($edad) && !empty($ciudad)) {
        $sql = "INSERT INTO form (nombre, apellido, edad, ciudad)
                VALUES ('$nombre', '$apellido', '$edad', '$ciudad')";
        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Registro agregado exitosamente.'); window.location.href='index.php';</script>";
        } else {
            echo "Error al insertar: " . $conn->error;
        }
    } else {
        echo "<script>alert('Por favor, complete todos los campos.'); window.location.href='index.php';</script>";
    }
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $sql = "DELETE FROM form WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Registro eliminado.'); window.location.href='index.php';</script>";
    } else {
        echo "Error al eliminar: " . $conn->error;
    }
}
?>
