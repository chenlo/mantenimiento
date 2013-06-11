<?php
/* @var $this IncidenciaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Incidencias',
);

if("historico"==Yii::app()->controller->action->id)
{    
    $this->menu=array(
    	array('label'=>'Mis incidencias', 'url'=>array('misincidencias')),
    );
}
else if("asignadas"!=Yii::app()->controller->action->id)
{    
    $this->menu=array(
    	array('label'=>'Mis incidencias resueltas', 'url'=>array('historico')),
    );
}

if("asignadas"==Yii::app()->controller->action->id){
    echo "<h1>Mis incidencias asignadas</h1>";
} 
else if("historico"==Yii::app()->controller->action->id)
{
    echo "<h1>Mis incidencias resueltas</h1>";
} else {
    echo "<h1>Mis incidencias</h1>";
}
?>
<br/>
<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
<br/><br/>
<?php 
if("asignadas"==Yii::app()->controller->action->id)
{
	$this->beginWidget('zii.widgets.CPortlet', array('title'=>'Comentarios recientes en la aplicaci&oacute;n',));
	$this->widget('ComentariosRecientesWidget'); 
	$this->endWidget(); 
}
?>

