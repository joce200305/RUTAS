<?php
require_once './app/config/conexion.php'; 
session_start();
$query = "SELECT * FROM t_producto";
$result = $conexion->query($query);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suits - Gestión de Productos</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="./public/css/index.css">
    <link rel="stylesheet" href="./public/css/dataTable.css">
</head>
<body>
<?php
        if (isset($_REQUEST['view'])) {
            $vista = $_REQUEST['view'];
        }else {
            $vista = "inicio";
        }
        switch ($vista) {
            case "inicio":{
                require_once './views/home.php';
                break;
            }
            case "login":{
                require_once './views/login.php';
                break;
            }

            case "registro":{
                require_once './views/registro.php';
                break;
            }
            case "editar":{
                require_once './views/editar_usuario.php';
                break;
            }
            
            default:{
                require_once './views/error404.php';
            }
                break;
        }
    ?>

    
</body>
</html>
