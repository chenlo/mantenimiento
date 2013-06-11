<?php
/* @var $this IncidenciaController */
/* @var $model Incidencia */

$this->breadcrumbs=array(
	'Incidencias'=>array('index'),
	$model->id,
);
$this->menu=array(
    array('label'=>'Administrar todas las incidencia', 'url'=>array('admin'),'visible'=>Yii::app()->user->checkAccess('admin')),

    array('label'=>'Añadir tarea a la incidencia', 'url'=>array('tarea/create','iid'=>$model->id), 'visible'=>Yii::app()->user->checkAccess('personal')),    
    array('label'=>'Añadir tarea a la incidencia', 'url'=>array('tarea/create','iid'=>$model->id), 'visible'=>Yii::app()->user->checkAccess('admin')),    
    array('label'=>'Actualizar incidencia', 'url'=>array('update','id'=>$model->id), 'visible'=>Yii::app()->user->checkAccess('admin')),    
);

?>

<h1>Ver incidencia #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nombre',
		'descripcion',
		'create_time',
		array(
                    'name'=>'create_usuario_id',
                    'value'=>CHtml::encode($model->creador->getNombre())
                ),            
		'update_time',
		array(
                    'name'=>'update_usuario_id',
                    'value'=>CHtml::encode($model->creador->getNombre())
                ),
                array(
                    'name'=>'estado_id',
                    'value'=>CHtml::encode($model->getEstadoText())
                ),
                array(
                    'name'=>'prioridad_id',
                    'value'=>CHtml::encode($model->getPrioridadText())
                ),
                array(
                    'name'=>'asignado_usuario_id',
                    'value'=>CHtml::encode($model->asignado->profile->firstname." ".$model->asignado->profile->lastname)
                ),
	),
)); ?>

<br />
<h1>Tareas asociadas a su incidencia</h1>
<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$tareaDataProvider,
	'itemView'=>'/tarea/_view',
)); ?>
<br/><br/>
<h1>Comentarios</h1>
<br/>
<div id="comments">
<?php if($model->comentariosCount>=1): ?>
    <h3 style="padding-bottom:15px;">
        <?php echo $model->comentariosCount>1 ? $model->comentariosCount . ' comentarios' : 'Un comentario'; ?>
    </h3>
    <?php $this->renderPartial('_comentarios',array(
            'comentarios'=>$model->comentarios,
    )); ?>
<?php endif; ?>
    
<?php if($model->estado_id!=3){ ?>    

    <h3>Deja un comentario</h3>

    <?php if(Yii::app()->user->hasFlash('comentarioEnviado')): ?>
        <div class="flash-success">
                <?php echo Yii::app()->user->getFlash('comentarioEnviado'); ?>
        </div>
    <?php else: ?>
        <?php $this->renderPartial('/comentario/_form',array(
                'model'=>$comentario,
        )); ?>
    <?php endif; ?>
    </div>

<?php } ?>
