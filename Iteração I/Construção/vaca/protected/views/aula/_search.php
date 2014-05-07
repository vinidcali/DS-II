<?php
/* @var $this AulaController */
/* @var $model Aula */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'conteudo'); ?>
		<?php echo $form->textField($model,'conteudo',array('size'=>60,'maxlength'=>1000)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'dataHora'); ?>
		<?php echo $form->textField($model,'dataHora'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cal_id'); ?>
		<?php echo $form->textField($model,'cal_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->