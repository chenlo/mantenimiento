<?php
/* @var $this IncidenciaController */
/* @var $model Incidencia */

$this->breadcrumbs=array(
	'Incidencias'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Editar',
);

$this->menu=array(
	array('label'=>'Listar todas las incidencia', 'url'=>array('index')),
	array('label'=>'Crear incidencia', 'url'=>array('create')),
	array('label'=>'Ver incidencia', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Administrar incidencias', 'url'=>array('admin')),
        array('label'=>'Añadir tarea a la incidencia', 'url'=>array('tarea/create','iid'=>$model->id)),
);
?>

<h1>Actualizar incidencia <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form_update', array('model'=>$model)); ?>