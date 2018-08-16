<?php
    
    include $_SERVER['DOCUMENT_ROOT'].'/CSA/Models/autoload.php';
    
    $accion = $_REQUEST['accion'];
    
    if($accion == "comprobar"){
        session_start();
        
        $usuario = $_REQUEST['usuario'];
        $contra = $_REQUEST['contra'];

        $tipo = Conexiones::comprobar($usuario, $contra);
        
        if($tipo == 1) {
            $_SESSION['tipo'] = "@administrador";
        } else if ($tipo == 2) {
            $_SESSION['tipo'] = "@usuario";
        } else {
            echo 'Sin datos';
        }
    }
    
    elseif($accion == "recuperar"){
        $correo = $_REQUEST['correo'];
        $contra = Conexiones::recuperarContra($correo);
        if ($contra != null){
            $mail = new Mailer();
            $mail->IsSMTP();
            //$mail->SMTPDebug  = 4;
            $mail->Host = "smtp.gmail.com"; // A RELLENAR. Aquí pondremos el SMTP a utilizar. Por ej. mail.midominio.com
            $mail->Port = 587; // Puerto de conexión al servidor de envio. 
            $mail->SMTPSecure = 'tls';
            $mail->SMTPAuth = true;
            $mail->Username = "jmesga3@gmail.com"; // A RELLENAR. Email de la cuenta de correo. ej.info@midominio.com La cuenta de correo debe ser creada previamente. 
            $mail->Password = "13sep2012"; // A RELLENAR. Aqui pondremos la contraseña de la cuenta de correo
            //$mail->From = "jmesga3@gmail.com"; // A RELLENARDesde donde enviamos (Para mostrar). Puede ser el mismo que el email creado previamente.
            //$mail->FromName = "Javi M.G."; //A RELLENAR Nombre a mostrar del remitente. 
            $mail ->setFrom('jmesga3@gmail.com', 'PROYECTO CSA');
            $mail->AddAddress($correo); // Esta es la dirección a donde enviamos 
            $mail->IsHTML(true); // El correo se envía como HTML
            $mail->CharSet = 'UTF-8'; // Activo condificacción utf-8
            $mail->Subject = "Recuperación de Contraseña"; // Este es el titulo del email. 
            $body = "Tu contraseña es: ".$contra;

            $mail-> Body = $body; // Mensaje a enviar. $exito = $mail->Send(); // Envía el correo.
            if($mail -> send()){ 
                echo 1;
            }
        }
    }
?>