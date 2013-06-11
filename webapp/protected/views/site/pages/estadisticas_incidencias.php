<script>
    function recargarEstadisticas(){
        var year = document.getElementById('year').value;
        var month = document.getElementById('month').value;
        var locus = "page?view=estadisticas_incidencias";
        locus += "&year="+year;
        locus += "&month="+month;
        
        window.location=locus;
    }
</script>
<?php
$this->pageTitle=Yii::app()->name . ' - Estadísticas Incidencias';
$this->breadcrumbs=array(
	'Estadísticas Personal',
);

$leyenda = "";
$meses = array();
$meses['01'] = "Enero";
$meses['02'] = "Febrero";
$meses['03'] = "Marzo"; 
$meses['04'] = "Abril"; 
$meses['05'] = "Mayo"; 
$meses['06'] = "Junio"; 
$meses['07'] = "Julio"; 
$meses['08'] = "Agosto"; 
$meses['09'] = "Septiembre"; 
$meses['10'] = "Octubre"; 
$meses['11'] = "Noviembre"; 
$meses['12'] = "Diciembre"; 
if(isset($_GET["month"])){
    if($_GET["month"]!="00"){
            $month = $_GET["month"];
            $leyenda .= $meses[$month] . " de ";
    } else {
            $month = "00";
    }
} else {
    $month = "00";
}

if(isset($_GET["year"]))
	$year = $_GET["year"];
else 
	$year = date('Y');
$leyenda .= $year;
?>

Selecciona año: &nbsp;
<select id="year" name="year" onChange="recargarEstadisticas()";>
<?php
$currentYear = date('Y');
foreach (range(2012, $currentYear) as $value) {
    if($value==$year)
        echo "<option value='".$value."' selected>" . $value . "</option> ";
    else
        echo "<option value='".$value."'>" . $value . "</option> ";
}
?>
</select>

 &nbsp; y (si lo deseas) mes: &nbsp;
<select id="month" name="month" onChange="recargarEstadisticas()";>
<option value="00">-- Todo el año --</option>    
<?php
for ($i=1; $i<=12; $i++)
{
    if(($i<10)){
        $mes = '0'.$i;
    } else {
        $mes = $i;
    }
    if($mes==$month)
        echo '<option value="'.$mes.'" selected>'.$meses[$mes].'</option>';
    else 
        echo '<option value="'.$mes.'">'.$meses[$mes].'</option>';
}   
?>
</select>  
<?php
$baja = array();
$media = array();
$alta = array();
$estados = array(0,1,2,3,4);
$estadosText = array("Sin asignar","Sin empezar","Empezada","Terminada","Pendiente");
foreach($estados as $estado){
    array_push($baja, Estadisticas::getIncidencias($estado,0,$year,$month));
    array_push($media, Estadisticas::getIncidencias($estado,1,$year,$month));
    array_push($alta, Estadisticas::getIncidencias($estado,2,$year,$month));
}
$sums = array();
foreach (array_keys($baja + $media + $alta) as $key) {
    $sums[$key] = @($baja[$key] + $media[$key] + $alta[$key]);
}
$total_incidencias=array_sum($sums);

$this->Widget('ext.highcharts.HighchartsWidget', array(
   'options'=>array(
      'chart' => array('type' => 'column'),			
      'title' => array('text' => 'Incidencias en ' . $leyenda),
      'subtitle' => array('text' => $total_incidencias." incidencias en total"),
      'xAxis' => array(
         'categories' => $estadosText,
      ),
      'yAxis' => array(
         'allowDecimals' => false,
         'title' => array('text' => 'Incidencias por tipo'),
      ), 
      'plotOptions' => array(
         'column' => array(
             'stacking' => 'normal',
         ),
      ),
      'series' => array(
         array('name' => 'Baja', 'data' => $baja),
         array('name' => 'Media', 'data' => $media),
         array('name' => 'Alta', 'data' => $alta),
      )
   )
));
?>