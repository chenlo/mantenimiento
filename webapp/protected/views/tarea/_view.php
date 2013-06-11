<?php
/* @var $this TareaController */
/* @var $data Tarea */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('tarea/view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre')); ?>:</b>
	<?php echo CHtml::encode($data->nombre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descripcion')); ?>:</b>
	<?php echo CHtml::encode($data->descripcion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipo_id')); ?>:</b>
	<?php echo CHtml::encode($data->getTipoText()); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estado_id')); ?>:</b>
	<?php echo CHtml::encode($data->getEstadoText()); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('create_time')); ?>:</b>
	<?php echo CHtml::encode($data->create_time); ?>
	<br />

        
        <b><?php echo CHtml::encode($data->getAttributeLabel('tiempo_realizacion')); ?>:</b>
	<?php echo CHtml::encode($data->getTiempoRealizacionText()); ?>
	<br />


</div>