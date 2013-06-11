<script>
    function recargarEstadisticas(){
        var year = document.getElementById('year').value;
        var month = document.getElementById('month').value;
        var personal = document.getElementById('personal').value;
        var locus = "page?view=estadisticas_tareas";
        locus += "&p="+personal;
        locus += "&year="+year;
        locus += "&month="+month;
        
        window.location=locus;
    }
</script>
<?php
$this->pageTitle=Yii::app()->name . ' - Estadísticas Tareas';
$this->breadcrumbs=array(
	'Estadísticas Tareas',
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

echo "<div style='float:right;'>";
echo "Selecciona personal: ";
echo "<select id='personal' name='personal' onChange='recargarEstadisticas();'>";
echo "<option>-- Personal --</option>";
foreach($personal as $p){
    if( isset($_GET['p']) && ($_GET['p']==$p['id']) ) {
        echo '<option value="'.$p['id'].'" selected>'.$p['username'].'</option>';
    } else {
        echo '<option value="'.$p['id'].'">'.$p['username'].'</option>';
    }
}
echo "</select>";
echo "</div>";
?>

<?php
if(isset($_GET['p'])){
    $results = Estadisticas::getPorcentajeTiempoTareas($_GET["p"],$year,$month);   
    if($results){
        $this->Widget('ext.highcharts.HighchartsWidget', array(
           'options'=>array(
              'chart' => array(
                  array(
                    'plotBackgroundColor' => null,
                    'plotBorderWidth' => null,
                    'plotShadow' => false
                  )
              ),			
              'title' => array('text' => 'Tiempo en la realización de tareas'),
              'series' => array(
                  array(
                    'type' => 'pie',
                    'name' => 'Tiempo por tarea',
                    'data' => array(
                        array('Menos de 15 mins',$results[0]),
                        array('Menos de 30 mins',$results[1]),
                        array('Entre 30 y 60 mins',$results[2]),
                        array('Entre 1 y 2 horas',$results[3]),
                        array('Más de 2 horas',$results[4]),
                     ),
                 ),    
              )
           )
        ));
    } else {
        echo "<br><br><br>";
        echo "<p>El usuario seleccionado no tiene ninguna tarea asignada en el periodo de tiempo seleccionado.</p>";
    }
}    
?>