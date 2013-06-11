<?php
/* @var $this IncidenciaController */
/* @var $data Incidencia */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre')); ?>:</b>
	<?php echo CHtml::encode($data->nombre); ?>
	<br />
        
        <b><?php echo CHtml::encode($data->getAttributeLabel('descripcion')); ?>:</b>
	<?php echo CHtml::encode($data->descripcion); ?>
	<br />
        
        <b><?php echo CHtml::encode($data->getAttributeLabel('estado_id')); ?>:</b>
	<?php echo CHtml::encode($data->getEstadoText()); ?>
	<br />
        
        <b><?php echo CHtml::encode($data->getAttributeLabel('prioridad_id')); ?>:</b>
	<?php echo CHtml::encode($data->getPrioridadText()); ?>
	<br />

	<?php echo CHtml::link('Ver detalles', array('view', 'id'=>$data->id)); ?>
	<br />

</div>