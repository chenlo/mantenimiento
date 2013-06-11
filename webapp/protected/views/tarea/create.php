<?php
/* @var $this TareaController */
/* @var $model Tarea */

$this->breadcrumbs=array(
	'Tareas'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Volver a la incidencia', 'url'=>array('incidencia/view', 'id'=>$model->id)),
);
?>

<h1>Añadir tarea a la incidencia: <?php echo $model->incidencia->nombre; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>