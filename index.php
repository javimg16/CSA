<?php session_start()?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php 
            /* HEADER */
            include 'Views/header.php';
        
            /* SECTION */
            /* login */
            if(!isset($_SESSION['tipo'])){
                include 'Views/Sections/login.php';
                if(isset($_REQUEST['accion'])){
                    include 'Controllers/comprobar.php';
                }
            /* gestores */    
            } else {
                
            }
            
            /* FOOTER */
            include 'Views/footer.php';
        ?>
    </body>
</html>
