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
            session_start();
            if(isset($_SESSION['tipo'])){
                header("location:login.php");
            }
            include 'Models/header.php' ;
        ?>
        
        <?php include 'Models/footer.php' ?>
    </body>
</html>
