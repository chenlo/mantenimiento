<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'comentario-form',
	'enableAjaxValidation'=>false,
)); ?>
       
<?php echo $form->errorSummary($model); ?>
<div class="row">
         <?php echo $form->labelEx($model,'contenido'); ?>
         <?php echo $form->textArea($model,'contenido',array('rows'=>6, 'cols'=>50)); ?>
         <?php echo $form->error($model,'contenido'); ?>
 </div>

 <div class="row buttons">
         <?php echo CHtml::submitButton($model->isNewRecord ? 'Enviar' : 'Guardar'); ?>
 </div>

<?php $this->endWidget(); ?>

</div>