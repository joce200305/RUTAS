<?php
if (isset($_SESSION['usuario'])) {
    header("location:inicio");
    exit();
}
?>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet"> <!-- FontAwesome -->
    <link rel="stylesheet" href="./public/css/loginsito.css">
    
    <div class="login-container text-center">
    <i class="fas fa-sign-in-alt"></i>
    <h3>Iniciar Sesión</h3>
    <form id="loginForm" action="app/controller/Usuarios.php" method="POST">
        <div class="mb-3">
            <label for="usuario" class="form-label">Usuario</label>
            <div class="input-group">
                <span class="input-group-text">
                    <i class="fas fa-user"></i>
                </span>
                <input type="text" class="form-control" id="usuario" name="usuario" required>
            </div>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Contraseña</label>
            <div class="input-group">
                <span class="input-group-text">
                    <i class="fas fa-lock"></i>
                </span>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
        </div>
        <button type="submit" class="btn login-btn">Iniciar Sesión</button>
        <button type="button" class="btn btn-danger" onclick="window.location.href='registro';">
            Registrar
        </button>
    </form>
</div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> 
    <script src="./public/js/login.js"></script>