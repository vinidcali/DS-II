<?php
/* @var $this FrequenciaController */
/* @var $model Frequencia */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'frequencia-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'presente'); ?>
		<?php echo $form->textField($model,'presente'); ?>
		<?php echo $form->error($model,'presente'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'aluno_id'); ?>
		<?php echo $form->textField($model,'aluno_id'); ?>
		<?php echo $form->error($model,'aluno_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'aula_id'); ?>
		<?php echo $form->textField($model,'aula_id'); ?>
		<?php echo $form->error($model,'aula_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->