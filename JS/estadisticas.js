/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

google.charts.load("current", {packages: ["corechart"]});

var pintar = function(datos, titulo){
    datos = jQuery.parseJSON(datos);
        for (var i = 0; i < datos.length; i++) {
            datos[i][1] = parseFloat(datos[i][1]);
        }
        datos.unshift(['Matricula', 'Horas']);
        google.charts.setOnLoadCallback(drawChart(datos, titulo));
}

$("#matricula").click(function () {
    $.ajax({
        url: "Controllers/user/estadisticas.php",
        type: "POST",
        data: {accion: "matricula"}
    }).done(function (datos) {
        var titulo = "Estadísticas por MATRÍCULA";
        pintar(datos, titulo);
    })
});

$("#modelo").click(function () {
    $.ajax({
        url: "Controllers/user/estadisticas.php",
        type: "POST",
        data: {accion: "modelo"}
    }).done(function (datos) {
        var titulo = "Estadísticas por MODELO";
        pintar(datos, titulo);
    })
});

$("#anno").click(function () {
    $.ajax({
        url: "Controllers/user/estadisticas.php",
        type: "POST",
        data: {accion: "anno"}
    }).done(function (datos) {
        var titulo = "Estadísticas por AÑO";
        pintar(datos, titulo);
    })
});

function drawChart(datos, titulo) {
    var data = google.visualization.arrayToDataTable(datos);
    var options = {
        title: titulo,
        is3D: true,
    };
    var chart = new google.visualization.PieChart(document.getElementById('grafica'));
    chart.draw(data, options);

} 