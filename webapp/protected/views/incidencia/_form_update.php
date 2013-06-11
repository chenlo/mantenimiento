<?php
/* @var $this IncidenciaController */
/* @var $model Incidencia */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'incidencia-form',
	'enableAjaxValidation'=>false,
)); ?>


	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'nombre'); ?>
		<?php echo $form->textField($model,'nombre',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'nombre'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'descripcion'); ?>
		<?php echo $form->textArea($model,'descripcion',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'descripcion'); ?>
	</div>
    
    	<div class="row">
		<?php echo $form->labelEx($model,'estado_id'); ?>
		<?php echo $form->dropDownList($model,'estado_id', $model->getEstadoOptions()); ?>
		<?php //echo $form->textField($model,'type_id'); ?>
		<?php echo $form->error($model,'estado_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'prioridad_id'); ?>
		<?php echo $form->dropDownList($model,'prioridad_id', $model->getPrioridadOptions()); ?>
		<?php echo $form->error($model,'prioridad_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'asignado_usuario_id'); ?>
		<?php echo $form->dropDownList($model,'asignado_usuario_id', $model->asignado->geUsuarioAsignableOptions()); ?>
		<?php echo $form->error($model,'asignado_usuario_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar'); ?>
	</div>


<?php $this->endWidget(); ?>

</div><!-- form -->