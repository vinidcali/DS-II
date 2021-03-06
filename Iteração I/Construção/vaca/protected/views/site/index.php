<?php
/* @var $this SiteController */
/* @var $model LoginForm */

$this->pageTitle=Yii::app()->name;
?>

<h1>Bem-vindo ao <i><?php echo CHtml::encode(Yii::app()->name); ?></i></h1>

<p>Para começar, por favor informe seu CPF e sua senha.</p>
<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'CPF'); ?>
		<?php echo $form->textField($model,'username'); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Senha'); ?>
		<?php echo $form->passwordField($model,'password'); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>
<div class='hint'>Para testar, utilize 12345/12345 ou 1212/1212</div>
	<div class="row rememberMe">
		<?php echo $form->checkBox($model,'rememberMe'); ?>
		<?php echo $form->label($model,'rememberMe'); ?>
		<?php echo $form->error($model,'rememberMe'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Entrar'); ?>
	</div>

<?php $this->endWidget(); ?>
</div>