<?php
/* @var $this AulaController */
/* @var $model Aula */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'aula-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'conteudo'); ?>
		<?php echo $form->textField($model,'conteudo',array('size'=>60,'maxlength'=>1000)); ?>
		<?php echo $form->error($model,'conteudo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'dataHora'); ?>
		<?php echo $form->textField($model,'dataHora'); ?>
		<?php echo $form->error($model,'dataHora'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cal_id'); ?>
		<?php echo $form->textField($model,'cal_id'); ?>
		<?php echo $form->error($model,'cal_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->