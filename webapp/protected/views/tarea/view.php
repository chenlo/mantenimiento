<?php
/* @var $this TareaController */
/* @var $model Tarea */

$this->breadcrumbs=array(
	'Tareas'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Volver a la incidencia', 'url'=>array('incidencia/view/'.$model->incidencia->id)),
	array('label'=>'Crear tarea', 'url'=>array('create', 'iid'=>$model->incidencia->id)),
	array('label'=>'Editar tarea', 'url'=>array('update', 'iid'=>$model->incidencia->id)),
	array('label'=>'Eliminar tarea', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Seguro que quiere eliminar la tarea?')),
);
?>

<h1>Ver Tarea #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nombre',
		'descripcion',
		'incidencia_id',
		array(
                    'name'=>'tipo_id',
                    'value'=>CHtml::encode($model->getTipoText())
                ),
                array(
                    'name'=>'estado_id',
                    'value'=>CHtml::encode($model->getEstadoText())
                ),
                array(
                    'name'=>'tiempo_realizacion',
                    'value'=>CHtml::encode($model->getTiempoRealizacionText())
                ),
                
	),
)); ?>
