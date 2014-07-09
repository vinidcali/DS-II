<?php
/* @var $this FrequenciaController */
/* @var $data Frequencia */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('presente')); ?>:</b>
	<?php echo CHtml::encode($data->presente); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('aluno_id')); ?>:</b>
	<?php echo CHtml::encode($data->aluno_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('aula_id')); ?>:</b>
	<?php echo CHtml::encode($data->aula_id); ?>
	<br />


</div>