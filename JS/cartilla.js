/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$("#pdf").click(function(){
    console.log($("#fecha").text());
    $.ajax({
        url: "Controllers/user/imprimir.php",
        type: "POST",
        data: {dni: $("#dni").text(),
            fecha: $("#fecha").text()}
    }).done(function(){
        
    }).fail();
})