<?php
/* @var $this IncidenciaController */
/* @var $model Incidencia */

$this->breadcrumbs=array(
	'Nueva incidencia',
);

?>

<h1>Nueva incidencia</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>