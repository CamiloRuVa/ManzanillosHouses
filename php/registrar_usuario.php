<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

include 'connect.php';

$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$fec_nac=$_POST['fec_nac'];
$num = $_POST['telefono'];
$correo = $_POST['correo'];
$con1 = $_POST['con1'];
$con2 = $_POST['con2'];

$sql = "SELECT id FROM usuarios WHERE correo = '$correo'";
$query = mysqli_query($conn,$sql);


if(mysqli_num_rows($query) > 0){
    echo '<script type="text/javascript">alert("Usuario ya existe")</script>';
    die();
}
else{
    
    
    if($con1==$con2){
        $contraseña = password_hash($con1, PASSWORD_DEFAULT);
        
        foreach($_FILES["archivo"]['tmp_name'] as $key => $tmp_name)
        {
            if($_FILES["archivo"]["name"][$key]) {
                $filename = $_FILES["archivo"]["name"][$key]; 
                $source = $_FILES["archivo"]["tmp_name"][$key];
                
                
                $sql2 = "INSERT INTO usuarios (nombre, apellidos, nacimiento, correo, contra,img_perfil,num) VALUES ('$nombre', '$apellido','$fec_nac', '$correo','$contraseña','$filename','$num')";
                if (!mysqli_query($conn, $sql2)) {
                          echo "Error: " . $sql2 . "<br>" . mysqli_error($conn);
                }

                $rs = mysqli_query($conn,"SELECT MAX(id) AS id FROM usuarios");
                if ($row = mysqli_fetch_row($rs)) {
                    $id_usuario = trim($row[0]);
                }

                $directorio = '../img/img_usuarios/'.$id_usuario.'';
    
                if(!file_exists($directorio)){
                    mkdir($directorio, 0777) or die("No se puede crear el directorio de extracci&oacute;n");	
                }
                
                $dir=opendir($directorio); 
                $target_path = $directorio.'/'.$filename;
                
                if(move_uploaded_file($source, $target_path)) {	
                    echo "El archivo $filename se ha almacenado en forma exitosa.<br>";
                    } else {	
                    echo "Ha ocurrido un error, por favor inténtelo de nuevo.<br>";
                }
                closedir($dir);
            }
        }
    
    
    
        enviar($correo,$nombre);
    
        mysqli_close($conn);
        header("Location:../IniSesion.html");
    }
    else{
        echo '<script type="text/javascript">alert("Las contraseñas no coinciden")</script>';
        die;
    }
}








function enviar($correo,$nombre){
    // ENVIO DE CORREO //


    require 'libreria/PHPmailer/Exception.php';
    require 'libreria/PHPmailer/PHPMailer.php';
    require 'libreria/PHPmailer/SMTP.php';

    $mail = new PHPMailer(true);

    try {
        //CONFIGURACION DEL SERVIDOR
        $mail->SMTPDebug = 0;                      					 // [0]NO MOSTRAR INFO. [2] MOSTRAR INFO. DEL ENVIO
        $mail->isSMTP();                                             // PROTOCOLO USADO [SMTP]
        $mail->Host       = 'smtp.gmail.com';                        // SERVIDOR QUE SE UTILIZA [GMAIL]
        $mail->SMTPAuth   = true;                                    // AUTENTICACION DE SMTP
        $mail->Username   = 'ManzanillosHouses@gmail.com';           // CORREO QUE SE UTILIZARA
        $mail->Password   = 'ManzaH3$4';                             // CONTRASE�A DEL CORREO
        $mail->SMTPSecure = 'ssl';         							 // TLS / SSL
        $mail->Port       =  465;                                    // CON TLS[587] CON SSL[465]
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );
        
        $mensaje = 
        '<html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Bienvenido</title>
        </head>
        <body>
            <table style="max-width: 600px; padding: 10px; margin:0 auto; border-collapse: collapse;">
                <tr>
                    <td style="background-color: #09f829; text-align: left; padding: 0">
                        <a href="https://jolly-lamarr-47ddfe.netlify.app/">
                            <img width="20%" style="display:block; margin: 1.5% 3%" src="https://i.postimg.cc/T2k2sP6z/unnamed.png">
                        </a>
                    </td>
                </tr>
                <tr>
                    <td style="padding: 0">
                        <img style="padding: 0; display: block" src="https://i.postimg.cc/bYb0Jnwh/EB-AW3905.jpg" width="100%">
                    </td>
                </tr>
                <tr>
                    <td style="background-color: #ecf0f1">
                        <div style="color: #34495e; margin: 4% 10% 2%; text-align: justify;font-family: sans-serif">
                            <h2 style="color: #e67e22; margin: 0 0 7px">Te damos la bienvenida a Manzanillo Homes</h2>
                            <p style="margin: 2px; font-size: 15px">
                                Tu correo ha sido registrado en nuestra plataforma, esperamos que encuentres tu casa deseada, un saludo.</p>
                            <div style="width: 100%; text-align: center"></br></br>
                                <a style="text-decoration: none; border-radius: 5px; padding: 11px 23px; color: white; background-color: #3498db" href="https://jolly-lamarr-47ddfe.netlify.app/">Ir a la página</a>	
                            </div>
                            <p style="color: #b3b3b3; font-size: 12px; text-align: center;margin: 30px 0 0">Manzanillo Homes</p>
                        </div>
                    </td>
                </tr>
            </table>
        </body>
        </html>';


        $mail->setFrom('ManzanillosHouses@gmail.com', 'Manzanillos Houses');   		// INFORMACION DEL REMITENTE
        $mail->addAddress($correo, $nombre);    			// INFORMACION DEL DESTINATARIO	

        //$mail->addAttachment('temp/2.png');    	// ADICIONALES(IMAGEN)
        
        // CONTENIDO
        $mail->isHTML(true);                                  
        $mail->Subject = 'ASUNTO MUY IMPORTANTE 2';
        $mail->Body    =$mensaje;
        
        // MENSAJE DE EXITO/ERROR
        $mail->send();
        //echo 'ENVIO EXITOSO';
        
        header("Location:../cambiar-contra2.html");
    } catch (Exception $e) {
        echo "NO SE PUDO ENVIAR: {$mail->ErrorInfo}";
    }
}

?>