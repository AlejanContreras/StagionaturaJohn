<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Métodos de Pago</title>
    <link href="mediospago.css" rel="stylesheet" type="text/css"/>
    <link rel="website icon" type="png" href="https://i.ibb.co/bvD1SGz/Captura-de-pantalla-20240928-093419.png">
</head>

<body>

    <header>
        <div class="logo">
            <a href="/INDEX PRINCIPAL/index.html">
                <img src="https://i.ibb.co/xs9xDGR/logo-Oscuro.png" alt="Captura-de-pantalla-20240928-093419" border="0" />
            </a>
        </div>
        <div class="vacio"></div>
        <div class="vacio"></div>
        <div class="sesion">
            <div>
                <a href="/SubPaginas/InicioSesion/iniciosesion.html">
                    <p>Iniciar sesión</p>
                </a>
            </div>
            <div>
                <a href="/SubPaginas/Registrarse/registrarse.html">
                    <p>Registrarse </p>
                </a>
            </div>
            <div>
                <a href="mediospago.php">
                    <p>Métodos de Pago</p>
                </a>
            </div>
        </div>
    </header>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Método</th>
                <th>Proveedor</th>
                <th>Tipo</th>
                <th>Comisión</th>
                <th>Moneda</th>
                <th>Estado</th>
                <th>Fecha de Registro</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Tarjeta de Crédito</td>
                <td>Visa</td>
                <td>Crédito</td>
                <td>2.5%</td>
                <td>COP</td>
                <td>Activo</td>
                <td>2024-09-27</td>
            </tr>

            <tr>
                <td>2</td>
                <td>Tarjeta de Crédito</td>
                <td>Mastercard</td>
                <td>Crédito</td>
                <td>2.7%</td>
                <td>COP</td>
                <td>Activo</td>
                <td>2024-09-27</td>
            </tr>

            <tr>
                <td>3</td>
                <td>Transferencia Bancaria</td>
                <td>Bancolombia</td>
                <td>Débito</td>
                <td>0.5%</td>
                <td>COP</td>
                <td>Activo</td>
                <td>2024-09-27</td>
            </tr>

            <tr>
                <td>4</td>
                <td>Pago en Efectivo</td>
                <td>Contraentrega</td>
                <td>En Persona</td>
                <td>0%</td>
                <td>COP</td>
                <td>Activo</td>
                <td>2024-09-27</td>
            </tr>

            <tr>
                <td>5</td>
                <td>Pago Móvil</td>
                <td>PayPal</td>
                <td>En línea</td>
                <td>3.5%</td>
                <td>USD</td>
                <td>Activo</td>
                <td>2024-09-27</td>
            </tr>

        </tbody>

    </table>


    <div class="container">
        <h2>Registrar Pago</h2>
        <form action="procesar_pago.php" method="POST">            
            <label for="nombre">Nombre Completo:</label>
                <input type="text" id="nombre" name="nombre" placeholder="Tu nombre completo" required>

            <label for="email">Correo Electrónico:</label>
                <input type="email" id="email" name="email" placeholder="Tu correo electrónico" required>

            <label for="metodo_pago">Selecciona el Método de Pago:</label>
                <select id="metodo_pago" name="metodo_pago" required>
                    <option value="Visa">Tarjeta de Crédito - Visa</option>
                    <option value="Mastercard">Tarjeta de Crédito - Mastercard</option>
                    <option value="Bancolombia">Transferencia Bancaria - Bancolombia</option>
                    <option value="Efectivo">Pago en Efectivo (Contraentrega)</option>
                    <option value="PayPal">Pago Móvil - PayPal</option>
                </select>

            <label for="cantidad">Cantidad a Pagar (COP):</label>
                <input type="number" id="cantidad" name="cantidad" placeholder="Valor en pesos colombianos" required min="1">

            <button type="submit">Registrar Pago</button>
        </form>
    </div>
    <footer>
        <section class="informacion">
            <p>Políticas de privacidad</p>
            <p>Copyright© Stagionatura</p>
            <p>Dirección: </p>
            <p>No. Teléfono</p>

        </section>
        <section class="vacio"></section>
        <section class="configuracion-logo">
            <div class="vacio"></div>
            <div class="confi-logo">
                <a>
                    <img src="https://w7.pngwing.com/pngs/873/399/png-transparent-cogwheel-configuration-gear-settings-user-interface-glyph-icon-thumbnail.png"
                        alt="Configuracion"  class="configuracion">
                </a>
                <a>
                    
                    <img src="https://i.ibb.co/zVRqMkr/logo-Claro.png" alt="Captura-de-pantalla-20240928-093419" border="0" />
                </a>
            </div>
        </section>
    </footer>
    <script></script>
</body>
</html>

<?php
// procesar_pago.php

// Conexión a la base de datos
$conn = new mysqli("localhost", "usuario_bd", "contraseña_bd", "nombre_bd");

// Verificar conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Obtener los datos del formulario
$nombre = $_POST['nombre'];
$email = $_POST['email'];
$metodo_pago = $_POST['metodo_pago'];
$cantidad = $_POST['cantidad'];

// Insertar los datos en la base de datos
$sql = "INSERT INTO registro_pagos (nombre, email, metodo_pago, cantidad, fecha)
        VALUES ('$nombre', '$email', '$metodo_pago', '$cantidad', NOW())";

if ($conn->query($sql) === TRUE) {
    echo "Pago registrado exitosamente";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Cerrar la conexión
$conn->close();
?>
