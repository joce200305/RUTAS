<?php
if (!isset($_SESSION['usuario'])) {
    header("location: ./login.php");
}
?>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Editar Usuario</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> <!-- SweetAlert -->
<link rel="stylesheet" href="./public/css/editarusuarito.css">

<div class="container mt-5">
    <h2>Editar Usuario</h2>
    <form id="editarUsuarioForm">
        <div class="form-group">
            <label for="usuario">Nuevo Usuario:</label>
            <input type="text" class="form-control" id="usuario" name="usuario" value="<?php echo htmlspecialchars($usuario_actual['usuario']); ?>">
        </div>
        <div class="form-group">
            <label for="password">Nueva Contraseña:</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
    </form>
    <button class="btn btn-secondary mt-3" onclick="window.location.href='inicio'">Volver</button>
</div>

<script src="./public/js/editar.js"></script>
