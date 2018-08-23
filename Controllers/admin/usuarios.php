<?php

/* 
  * Esta clase rescata las variables de usuario de menu principal
  * 
 */
$accion = $REQUEST['accion'];

//Alta de usuarios
if ($accion == 'alta'){
    
    $usuario = $REQUEST['usuario'];
    $contra = $REQUEST['contra'];
    $correo = $REQUEST['correo'];
    
    Gestores::create($usuario, $contra, 2, $correo);
    
} 
//Busqueda de usuarios
elseif ($accion = 'busqueda'){
    
    include $_SERVER['DOCUMENT_ROOT'].'/CSA/Models/autoload.php';

    $id = $_REQUEST['id'];

    $envio = Gestores::retrive($id, 2);

    echo json_encode($envio);    
} 
    // Modificar usuarios
    elseif ($accion == 'modificar') {
        include $_SERVER['DOCUMENT_ROOT'].'/CSA/Models/autoload.php';

        $id = $_REQUEST['id'];
        $usuario = $_REQUEST['usuario'];
        $contra = $_REQUEST['contra'];
        $tipo = $_REQUEST['tipo'];
        $correo = $_REQUEST['correo'];

        $respuesta = Gestores::update($id, $usuario, $contra, $tipo, $correo);

        echo $respuesta;
    }
//Borrar usuarios
elseif ($accion == 'borrar') {
       include $_SERVER['DOCUMENT_ROOT'].'/CSA/Models/autoload.php';

        $id = ($_REQUEST['id']);
    
        $realizado = Gestores::delete($id, 2);
        
        echo $realizado;
}

?>