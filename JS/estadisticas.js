/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


google.charts.load("current", {packages:["corechart"]});
google.charts.setOnLoadCallback(drawChart);
function drawChart() {
    $.ajax({
        url: "Controllers/user/estadisticas.php",
        type: "POST",
        data: {accion: "matricula"}
    }).done(function(datos){
        datos = jQuery.parseJSON(datos);
        for(var i = 0; i < datos.length; i++){
            datos[i][1] = parseFloat(datos[i][1]);
        }
        datos.unshift(['Matricula', 'Horas']);
       
        var data = google.visualization.arrayToDataTable(datos);
        
        var options = {
            title: 'ESTADÍSTICAS POR MATRÍCULA',
            is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('grafica'));
        chart.draw(data, options);
    })
}
 