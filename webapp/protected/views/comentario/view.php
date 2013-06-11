<?php
$this->breadcrumbs=array(
	'Comentarios'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Comentario', 'url'=>array('index')),
	array('label'=>'Create Comentario', 'url'=>array('create')),
	array('label'=>'Update Comentario', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Comentario', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Comentario', 'url'=>array('admin')),
);
?>

<h1>View Comentario #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'contenido',
		'incidencia_id',
		'create_time',
		'create_user_id',
		'update_time',
		'update_user_id',
	),
)); ?>
