<?php
/* @var $this IncidenciaController */
/* @var $model Incidencia */

$this->breadcrumbs=array(
	'Incidencias'=>array('index'),
	'Administrar',
);

$this->menu=array(
	array('label'=>'Listar todas las incidencias abiertas', 'url'=>array('admin')),
	array('label'=>'Crear incidencia', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#incidencia-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Administrar todas las incidencias cerradas</h1>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'incidencia-grid',
	'dataProvider'=>$dataProvider,
	'columns'=>array(
		'id',
		array(
                    'name'=>'create_usuario_id',
                    'value' => '$data->creador->profile->firstname." ".$data->creador->profile->lastname',
                ),
                'nombre',
		'create_time',
                array(
                    'name'=>'estado_id',
                    'value' => '$data->getEstadoText()',
                ),
                array(
                    'name'=>'asignado_usuario_id',
                    'value' => '$data->asignado->profile->firstname." ".$data->asignado->profile->lastname',
                ),
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>

