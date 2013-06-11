<?php
$this->breadcrumbs=array(
	'Comentarios'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Comentario', 'url'=>array('index')),
	array('label'=>'Create Comentario', 'url'=>array('create')),
	array('label'=>'View Comentario', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Comentario', 'url'=>array('admin')),
);
?>

<h1>Update Comentario <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>