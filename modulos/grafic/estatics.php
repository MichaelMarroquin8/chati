<div class="columna">	
	
	
		<div id="graf" class="cajafour"></div>
		<script type="text/javascript">
var colors = Highcharts.getOptions().colors,
    categories = [],
	
    data = [
        {

            drilldown: {
                name: 'No atendidos',
                categories: ['No atendidos'],
                data: [<?php	
$trabaj=mysqli_query($conn,"select id,user,user_id,to_user,to_id,message,fecha,nombre_equipo_user,leido,sonido,archivos,tokeng,fechasep,horasep,COUNT(*) as contador from `msjs` where to_user='$nombre' and leido='NO'");
while($grafi = mysqli_fetch_array($trabaj)){		
		
		
		$contador=$grafi['contador'];
		}
		
?> 

<?php echo $contador; ?>]
            }
        },
        {

            drilldown: {
                name: 'Finalizados',
                categories: ['Finalizados'],
                data: [<?php	
$trabajtw=mysqli_query($conn,"select id,user,user_id,to_user,to_id,message,fecha,nombre_equipo_user,leido,sonido,archivos,tokeng,fechasep,horasep,COUNT(*) as contadortw from `msjs` where to_user='$nombre' and leido='SI'");
while($grafitw = mysqli_fetch_array($trabajtw)){		
		
		
		$contadortw=$grafitw['contadortw'];
		}
		
?> 

<?php echo $contadortw; ?>]
            }
        },
        {

            drilldown: {
                name: 'Atendidos',
                categories: ['Atendidos'],
                data: [<?php	
$trabajtr=mysqli_query($conn,"select id,user,user_id,to_user,to_id,message,fecha,nombre_equipo_user,leido,sonido,archivos,tokeng,fechasep,horasep,COUNT(*) as contadortr from `msjs` where to_user='$nombre' and leido='SI'");
while($grafitr = mysqli_fetch_array($trabajtr)){		
		
		
		$contadortr=$grafitr['contadortr'];
		}
		
?> 

<?php echo $contadortr; ?>]
            }
        }
    ],
    versionsData = [],
    i,
    j,
    dataLen = data.length,
    drillDataLen,
    brightness;


// Build the data arrays
for (i = 0; i < dataLen; i += 1) {

    // add version data
    drillDataLen = data[i].drilldown.data.length;
    for (j = 0; j < drillDataLen; j += 1) {
        brightness = 0.2 - (j / drillDataLen) / 5;
        versionsData.push({
            name: data[i].drilldown.categories[j],
            y: data[i].drilldown.data[j],
            color: Highcharts.color(data[i].color).brighten(brightness).get()
        });
    }
}


Highcharts.chart('graf', {
	colors: ['#d2d1d0','#42c9ed','#50f189','#f6565b','#11101d'],
    chart: {
		backgroundColor: '#f5f5f5',
		borderRadius: '15px',
        type: 'pie'
    },
    title: {
        text: 'Chats'
    },
    plotOptions: {
        pie: {
         allowPointSelect: true,
         cursor: 'pointer',
		 center: ['50%', '50%'],
         dataLabels: {
            enabled: false           
         },
         showInLegend: true
        }
    },
    tooltip: {
        valueSuffix: '%'
    },
	
    series: [{
        name: 'Chats',
        data: versionsData,
        size: '80%',
        innerSize: '60%',
        dataLabels: {
            formatter: function () {
                // display only if larger than 1
                return this.y > 1 ? '<b>' + this.point.name + ':</b> ' +
                    this.y + '%' : null;
            }
        },
        id: 'Chats'
    }],
    responsive: {
        rules: [{
            condition: {
                maxWidth: 400
            },
            chartOptions: {
                series: [{
                }, {
                    id: 'Chats',
                    dataLabels: {
                        enabled: false
                    }
                }]
            }
        }]
    }
});
		</script>
		



<div id="graftw" class="cajafour"></div>
		<script type="text/javascript">
Highcharts.chart('graftw', {
	colors: ['#d2d1d0','#42c9ed','#50f189','#f6565b','#11101d'],
	chart: {
		backgroundColor: '#f5f5f5',
		borderRadius: '15px'
    },
    title: {
        text: 'Total Chats Atendidos'
    },
	
	 xAxis: {
        categories: ['OCT']
		},

    subtitle: {
        text: ''
    },

    yAxis: {
        title: {
            text: 'Cantidad'
        }
    },
   
    series: [{
		type:'column',
        name: 'No Atendidos',
        data: [
	<?php
$sqltrfr=mysqli_query($conn,"select id,user,user_id,to_user,to_id,message,fecha,nombre_equipo_user,leido,sonido,archivos,tokeng,fechasep,horasep,COUNT(*) as contamesuno from `msjs` where to_user='$nombre' and leido='NO'");
while($graficatwfr = mysqli_fetch_array($sqltrfr)){
	
	$leido = $graficatwfr['leido'];
	$contamesuno = $graficatwfr['contamesuno'];
	
?>		

		[<?php echo $contamesuno; ?>],

		
<?php
}
?>		
		
		]
    }, {
		type:'column',
        name: 'Finalizados',
        data: [
	<?php
$sqlenvi=mysqli_query($conn,"select id,user,user_id,to_user,to_id,message,fecha,nombre_equipo_user,leido,sonido,archivos,tokeng,fechasep,horasep,COUNT(*) as contamedos from `msjs` where to_user='$nombre' and leido='SI'");
while($graenvi = mysqli_fetch_array($sqlenvi)){
	
	$leido = $graenvi['leido'];
	$contamedos = $graenvi['contamedos'];
	
?>		

		[<?php echo $contamedos; ?>],

		
<?php
}
?>		
		
		]
    }, {
		type:'column',
        name: 'Atendidos',
        data: [
	<?php
$sqlreza=mysqli_query($conn,"select id,user,user_id,to_user,to_id,message,fecha,nombre_equipo_user,leido,sonido,archivos,tokeng,fechasep,horasep,COUNT(*) as contatres from `msjs` where to_user='$nombre' and leido='SI'");
while($grareza = mysqli_fetch_array($sqlreza)){
	
	$leido = $grareza['leido'];
	$contatres = $grareza['contatres'];
	
?>		

		[<?php echo $contatres; ?>],

		
<?php
}
?>		
		
		]
    }]

});
		</script>
	
		


		
		
</div>		
		
<div class="columna">




<div id="graftr" class="cajafour"></div>
		<script type="text/javascript">

Highcharts.chart('graftr', {
    colors: ['#42c9ed','#50f189','#ff7800','#f6565b','#11101d'],
    chart: {
		backgroundColor: '#f5f5f5',
		borderRadius: '15px',
        type: 'bar',
        styledMode: true
    },

    title: {
        text: 'Chats Atendidos'
    },
	xAxis: {
        categories: ['Chats']
		},
		
    yAxis: [{
        className: 'highcharts-color-0',
        title: {
            text: 'Cantidad'
        }
    }, {
        className: 'highcharts-color-1',
        opposite: true,
        title: {
            text: ''
        }
    }],
    legend: {
        reversed: true
    },
    plotOptions: {
        column: {
            borderRadius: 5
        }
    },

    series: [{
        name: 'Total',
        data: [<?php	
$peti=mysqli_query($conn,"select id,user,user_id,to_user,to_id,message,fecha,nombre_equipo_user,leido,sonido,archivos,tokeng,fechasep,horasep,COUNT(*) as contapet from `msjs` where to_user='$nombre'");
while($grapet = mysqli_fetch_array($peti)){		
		
		
		$contapet=$grapet['contapet'];
		}
		
?> 

<?php echo $contapet; ?>]
    }, {
        name: 'Completadas',
        data: [<?php	
$peticom=mysqli_query($conn,"select id,user,user_id,to_user,to_id,message,fecha,nombre_equipo_user,leido,sonido,archivos,tokeng,fechasep,horasep,COUNT(*) as congr from `msjs` where to_user='$nombre' and leido='SI'");
while($gracom = mysqli_fetch_array($peticom)){		
		
		
		$congr=$gracom['congr'];
		}
		
?> 

<?php echo $congr; ?>]
    }]

});
		</script>	




<div class="caja">

				  
					  
<div class="columnatw">
								<div class="m3">
                                    <div class="mx-auto">
                                        <h6 class="text-muted">Tiempo de Atención</h6>
                                        <h3 class="font-weight-bold">
										
							<?php
								if ($idusuario=='1'){
							?>
									1 min 23 seg	
							<?php
								}else{
							?>
								<img src="imagenes/new.gif" width="50px">
							<?php
								}
							?>		
										</h3>
                                        <h6 class="text-success"><i class="icon ion-md-arrow-dropup-circle"></i> </h6>
                                    </div>
                                </div>
<?php
//count
$queja=mysqli_query($conn,"select idcal,idcliente,idusur,puntaje,COUNT(*) as contad from `calificar` where idcliente='$idusuario' ");
while($graque = mysqli_fetch_array($queja)){
	
	$contad = $graque['contad'];

}
?>

<?php
$calificat=mysqli_query($conn,"select idcal,idcliente,idusur,puntaje,SUM(puntaje) as estrellas from `calificar` where idcliente='$idusuario' ");
while($gracal = mysqli_fetch_array($calificat)){
	
	 $estrellas = $gracal['estrellas'] / $contad;

}
?>
								
                                <div class="m3">
                                    <div class="mx-auto">
                                        <h6 class="text-muted">Calificación Promedio</h6>
                                        <h3 class="font-weight-bold">
							<?php echo round($estrellas,1); ?> <img src="imagenes/destacado.png" width="10px">
							
										
										</h3>
                                        <h6 class="text-success"><i class="icon ion-md-arrow-dropup-circle"></i></h6>
                                    </div>
                                </div>
</div>
<div class="columnatw">	

<?php
$queja=mysqli_query($conn,"select idcal,idcliente,idusur,puntaje,COUNT(*) as quejasnew from `calificar` where idcliente='$idusuario' and puntaje<3 ");
while($graque = mysqli_fetch_array($queja)){
	
	$quejasnew = $graque['quejasnew'];

}
?>

							
                                <div class="m3">
                                    <div class="mx-auto">
                                        <h6 class="text-muted">Quejas</h6>
                                        <h3 class="font-weight-bold"><?php echo $quejasnew;?></h3>
                                        <h6 class="text-success"><i class="icon ion-md-arrow-dropup-circle"></i> </h6>
                                    </div>
                                </div>
								
<?php
$contenvi=mysqli_query($conn,"select id,user,user_id,to_user,to_id,message,fecha,nombre_equipo_user,leido,sonido,archivos,tokeng,fechasep,horasep,COUNT(*) as conenvi from `msjs` where to_user='$nombre' and leido='NO'");
while($graenvi = mysqli_fetch_array($contenvi)){
	
	$conenvi = $graenvi['conenvi'];

}
?>								
                                <div class="m3">
                                    <div class="mx-auto">
                                        <h6 class="text-muted">Chats Activos</h6>
                                        <h3 class="font-weight-bold"><?php echo $conenvi;?></h3>
                                        <h6 class="text-success"><i class="icon ion-md-arrow-dropup-circle"></i></h6>
                                    </div>
                                </div>
</div>								

</div>		
</div>	