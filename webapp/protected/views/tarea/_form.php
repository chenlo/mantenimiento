<?php
/* @var $this TareaController */
/* @var $model Tarea */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tarea-form',
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
		<?php echo $form->labelEx($model,'tipo_id'); ?>
		<?php echo $form->dropDownList($model,'tipo_id', $model->getTipoOptions()); ?>
		<?php echo $form->error($model,'tipo_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'estado_id'); ?>
		<?php echo $form->dropDownList($model,'estado_id', $model->getEstadoOptions()); ?>
		<?php echo $form->error($model,'estado_id'); ?>
	</div>
    
         <div class="row">
		<?php echo $form->labelEx($model,'tiempo_realizacion'); ?>
		<?php echo $form->textField($model,'tiempo_realizacion',array('value'=>0,'size'=>3,'maxlength'=>5)); ?>
		<?php echo $form->error($model,'tiempo_realizacion'); ?>
	</div>
	
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear tarea' : 'Guardar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->