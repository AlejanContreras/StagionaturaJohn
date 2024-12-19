<?php 
// Mostrar errores de PHP para depuración
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// CONEXIóN A BASE DE DATOS
$servidor = "sql205.infinityfree.com";  
$usuario = "if0_37386526";  
$clave = "3125285082";  
$bddatos = "if0_37386526_ubicacion";  

// Conexión a la base de datos
$conexion = mysqli_connect($servidor, $usuario, $clave, $bddatos);
if (!$conexion) {
    die("Error en la conexi�n: " . mysqli_connect_error());
}

// INSERTAR DATOS
if (isset($_POST["Enviar"])) {
    $id_usuario = $_POST['id_usuario'];  
    $nombre = $_POST['nombre'];
     $apellido = $_POST['apellido']; //
    $numero = $_POST['numero']; 
    $email = = $_POST['email']; 
    $departamento = $_POST['departamento']; // 
    $municipio = $_POST['municipio'];
    $direccion = $_POST['direccion']; 
    $especificaciones = $_POST['especificaciones']; 

    // Asegúrate de que todos los campos est�n completos
    if (!empty($id_usuario) && !empty($nombre) && !empty($apellido) && !empty($numero) && !empty($email) && !empty($departamento) && !empty($municipio) && !empty($direccion) && !empty($especificaciones)) {
        $insertar = "INSERT INTO contactenos (id_usuario, nombre, apellido, numero, email, departamento, municipio, direccion, especificaciones) 
                     VALUES ('$id_usuario', '$nombre', '$apellido', '$numero', '$email', '$departamento', '$municipio', '$direccion', '$especificaciones')";

        // Ejecutar la consulta de inserción
        $resultado = mysqli_query($conexion, $insertar);
        if (!$resultado) {
            die("Error al insertar registros: " . mysqli_error($conexion));
        } else {
            echo "<script>alert('DATOS INSERTADOS CORRECTAMENTE, NOS CONTACTAREMOS CONTIGO')</script>";
            echo "<script>location.href='index.html'</script>";
        }
    } else {
        echo "<script>alert('Por favor completa todos los campos')</script>";
    }

    // Cerrar la conexión
    mysqli_close($conexion);
}
?>