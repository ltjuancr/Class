<!DOCTYPE html>
<html>
<head>
	<title>Graficos</title>
	{{HTML::style('bootstrap/css/bootstrap.min.css')}}
</head>
<body>
	<h1>Graficos</h1>
	<button id="cargar">Cargar</button>
	<div id="grafico">
		
	</div>
	<div id="grafico2">
		
	</div>

    <div id="grafico3">
        
    </div>
	{{HTML::script('js/jquery-2.1.1.min.js')}}
	{{HTML::script('js/highcharts/highcharts.js')}}
	{{HTML::script('js/highcharts/highcharts-3d.js')}}
	{{HTML::script('js/highcharts/exporting.js')}}
	<script type="text/javascript">
	$(document).ready(function() {
        $.getJSON('datos', {}, function(json) {
        	var data = [];
        	for (var i = 0; i < json.length; i++) {
        		data.push([json[i].nombre, parseInt(json[i].numero)]); 
        	};
        	cargar_grafico($('#grafico'), data, 'Ventas por vendedor');
            cargar_grafico_2($('#grafico2'), data, 'Ventas por vendedor');
            cargar_grafico_3($('#grafico3'), data, 'Ventas por vendedor');
        	
        });
       	
	});


function cargar_grafico(selector, data, titulo) {
    selector.highcharts({
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: 1,//null,
            plotShadow: false
        },
        title: {
            text: titulo
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                    style: {
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                    }
                }
            }
        },
        series: [{
            type: 'pie',
            name: 'Browser share',
            data: data
        }]
    });
  }

function cargar_grafico_2(selector, data, titulo) {
    selector.highcharts({
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: 1,
            plotShadow: false
        },
        title: {
            text: titulo,
            align: 'center',
            verticalAlign: 'middle',
            y: 50
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                dataLabels: {
                    enabled: true,
                    distance: -50,
                    style: {
                        fontWeight: 'bold',
                        color: 'white',
                        textShadow: '0px 1px 2px black'
                    }
                },
                startAngle: -90,
                endAngle: 90,
                center: ['50%', '75%']
            }
        },
        series: [{
            type: 'pie',
            name: 'Browser share',
            innerSize: '50%',
            data: data
        }]
    });
}

function cargar_grafico_3(selector, data, titulo) {
    // Make monochrome colors and set them as default for all pies
    Highcharts.getOptions().plotOptions.pie.colors = (function () {
        var colors = [],
            base = Highcharts.getOptions().colors[0],
            i;

        for (i = 0; i < 10; i += 1) {
            // Start out with a darkened base color (negative brighten), and end
            // up with a much brighter color
            colors.push(Highcharts.Color(base).brighten((i - 3) / 7).get());
        }
        return colors;
    }());

    // Build the chart
   selector.highcharts({
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: 1,
            plotShadow: false
        },
        title: {
            text: titulo
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                    style: {
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                    }
                }
            }
        },
        series: [{
            type: 'pie',
            name: 'Browser share',
            data: data
        }]
    });
}




	</script>
</body>
</html>