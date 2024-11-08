<?php
require_once '../config/conexion.php';

class User {
    private $conexion;
    private $id_usuario;

    public function __construct($conexion, $id_usuario) {
        $this->conexion = $conexion;
        $this->id_usuario = $id_usuario;
    }

    public function obtener_usuario_actual() {
        $sql = "SELECT usuario FROM t_usuario WHERE id_usuario = :id_usuario";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bindParam(':id_usuario', $this->id_usuario);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function actualizar_usuario($nuevo_usuario, $nueva_password) {
        $sql_update = "UPDATE t_usuario SET usuario = :nuevo_usuario, password = :nueva_password WHERE id_usuario = :id_usuario";
        $stmt_update = $this->conexion->prepare($sql_update);
        $stmt_update->bindParam(':nuevo_usuario', $nuevo_usuario);
        $stmt_update->bindParam(':nueva_password', $nueva_password);
        $stmt_update->bindParam(':id_usuario', $this->id_usuario);

        if ($stmt_update->execute()) {
            return json_encode(['success' => true, 'message' => 'Usuario actualizado correctamente.']);
        } else {
            return json_encode(['success' => false, 'message' => 'Error al actualizar el usuario.']);
        }
    }
}

$user = new User($conexion, $_SESSION['id_usuario']); 

$usuario_actual = $user->obtener_usuario_actual();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nuevo_usuario = $_POST['usuario'];
    $nueva_password = $_POST['password'];

    echo $user->actualizar_usuario($nuevo_usuario, $nueva_password);
    session_destroy(); 
    exit(); 
}
?>
