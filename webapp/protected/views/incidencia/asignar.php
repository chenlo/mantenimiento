<?php
$this->pageTitle=Yii::app()->name . ' - Add User To Project';
$this->breadcrumbs=array(
	$model->incidencia->nombre=>array('view','id'=>$model->incidencia->id),
	'Add User',
);
$this->menu=array(
	array('label'=>'Back To Project', 'url'=>array('view','id'=>$model->incidencia->id)),
);
?>

<h1>Add User To <?php echo $model->incidencia->nombre; ?></h1>

<?php if(Yii::app()->user->hasFlash('success')):?>
     <div class="successMessage">
	      <?php echo Yii::app()->user->getFlash('success'); ?>
	 </div>
<?php endif; ?>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm'); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<div class="row">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->dropDownList($model,'username', $model->incidencia->getUsuarioOptions()); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>
	
	<div class="row buttons">
		<?php echo CHtml::submitButton('Add User'); ?>
	</div>

<?php $this->endWidget(); ?>
</div>
