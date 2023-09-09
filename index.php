<?php


$connect = mysqli_connect('localhost', 'usb', 'usb2022', 'formulatio');

$cliente = isset($_POST['cliente']) ? $_POST['cliente'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$message = isset($_POST['message']) ? $_POST['message'] : '';
$departamento = isset($_POST['departamento']) ? $_POST['departamento'] : ''; // Actualizamos el nombre del campo
$empleados_atencion_cliente = array("Laura López AC", "Carlos Pérez AC", "Ana Rodríguez AC", "Javier Martínez AC"); //nombrs aleatorio
$empleados_soporte_tecnico = array("Jaime Rubiano SP", "Maria Garcia SP", "Pedro Sanchez SP", "Arley Ramirez SP");//nombrs aleatorio
$empleados_facturacion = array("Sara Torres FA", "Luis González FA", "Elena Fernández FA", "Juan Díaz FA");//nombrs aleatorio

// Selecciona un empleado aleatorio para mostrar en el formulario
$empleado_seleccionado = '';

if (isset($_POST['departamento'])) {
    $departamento_elegido = $_POST['departamento'];
    
    switch ($departamento_elegido) {
        case 'ATENCION CLIENTE':
            $empleado_seleccionado = $empleados_atencion_cliente[array_rand($empleados_atencion_cliente)];
            break;
        case 'SOPORTE TECNICO':
            $empleado_seleccionado = $empleados_soporte_tecnico[array_rand($empleados_soporte_tecnico)];
            break;
        case 'FACTURACION':
            $empleado_seleccionado = $empleados_facturacion[array_rand($empleados_facturacion)];
            break;
        default:
            // Departamento no válido
            break;
    }
}


$cliente_error = '';
$email_error = '';
$message_error = '';
$departamento_error = ''; // Actualizamos el nombre del campo

if (count($_POST)) { 
    $errors = 0;
    

    if ($_POST['cliente'] == '') { // Actualizamos el nombre del campo
        $cliente_error = 'Please enter your name'; // Actualizamos el mensaje de error
        $errors++;
    }

    if ($_POST['email'] == '') {
        $email_error = 'Please enter an email address';
        $errors++;
    }

    if ($_POST['message'] == '') {
        $message_error = 'Please enter a message';
        $errors++;
    }

    if ($_POST['departamento'] == '') { // Actualizamos el nombre del campo
        $departamento_error = 'Please select a department'; // Actualizamos el mensaje de error
        $errors++; 
    }

    if ($errors == 0) {
      
    
        $query = 'INSERT INTO contact (
                cliente,
                email,
                message,
                departamento,
                empleado  
            ) VALUES (
                "'.addslashes($_POST['cliente']).'",
                "'.addslashes($_POST['email']).'",
                "'.addslashes($_POST['message']).'",
                "'.addslashes($_POST['departamento']).'",
                "'.addslashes($empleado_seleccionado).'"  
            )';
        mysqli_query($connect, $query);
    
        $message = 'You have received a contact form submission:
            
    Name: '.$_POST['cliente'].' 
    Email: '.$_POST['email'].'
    Department: '.$_POST['departamento'].' 
    Employee: '.$empleado_seleccionado.'  
    Message: '.$_POST['message'];
    
        mail('poveda.geovanny@hotmail.com', 
            'Contact Form Submission',
            $message);
    
       // header('Location: thankyou.html');
       // die();

        $ultimo_id = mysqli_insert_id($connect);
        $query = 'SELECT cliente, departamento, empleado FROM contact WHERE id = ' . $ultimo_id;
        $result = mysqli_query($connect, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);

            // Pasar los valores como parámetros en la URL  http://localhost/form-fv-main/thankyou.html
        header('Location: thankyou.html?cliente=' . urlencode($row['cliente']) . '&id=' . $ultimo_id . '&departamento=' . urlencode($row['departamento']) . '&empleado=' . urlencode($row['empleado']));
        die();
        }
    }
    
}


?>
<!doctype html>
<html>
    <head>
        <title>PHP Contact Form</title>
    </head>
    <body>
    
        <h1>PHP Contact Form</h1>

        <form method="post" action="">
        
            Name:
            <br>
            <input type="text" name="cliente">
            <br><br>
            Email Address:
            <br>
            <input type="text" name="email" value="<?php echo $email; ?>">
            <?php echo $email_error; ?>

            <br><br>
            <label for="departamento">Departamento</label>
            <br>
            <select name="departamento" id="dep">
            <option value="ATENCION CLIENTE">Atención al Cliente</option>
            <option value="SOPORTE TECNICO">Soporte Técnico</option>
            <option value="FACTURACION">Facturación</option>
            </select>
            <br><br>

            Message:
            <br>
            <textarea name="message"><?php echo $message; ?></textarea>
            <?php echo $message_error; ?>

            <br><br>

            <input type="submit" value="Submit">

        </form>
    
    </body>
</html>
