<script>
    function recargarEstadisticas(){
        var year = document.getElementById('year').value;
        var month = document.getElementById('month').value;
        var locus = "page?view=estadisticas_personal";
        locus += "&year="+year;
        locus += "&month="+month;
        
        window.location=locus;
    }
</script>
<?php
$this->pageTitle=Yii::app()->name . ' - Estadísticas Personal';
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
$personal = Estadisticas::getUsuariosPersonal();
$nombresPersonal = Estadisticas::getArrayFromAtributo($personal,"username");
$idsPersonal = Estadisticas::getArrayFromAtributo($personal,"id");
$prioridades = Incidencia::getPrioridades();

$baja = array();
$media = array();
$alta = array();
foreach($personal as $per){
    array_push($baja, Estadisticas::getIncidenciasPersonal($per["id"],0,$year,$month));
    array_push($media, Estadisticas::getIncidenciasPersonal($per["id"],1,$year,$month));
    array_push($alta, Estadisticas::getIncidenciasPersonal($per["id"],2,$year,$month));
}

$this->Widget('ext.highcharts.HighchartsWidget', array(
   'options'=>array(
      'chart' => array('type' => 'bar'),			
      'title' => array('text' => 'Incidencias resueltas'),
      'subtitle' => array('text' => $leyenda),
      'xAxis' => array(
         'categories' => $nombresPersonal
      ),
      'yAxis' => array(
         'title' => array('text' => 'Número de incidencias'),
         'allowDecimals' => false,
      ),
      'plotOptions' => array(
         'series' => array('stacking' => 'normal')
      ),
      'series' => array(
         array('name' => 'Baja', 'data' => $baja),
         array('name' => 'Media', 'data' => $media),
         array('name' => 'Alta', 'data' => $alta),
      )
   )
));
?>