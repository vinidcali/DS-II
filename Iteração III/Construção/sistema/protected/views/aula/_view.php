<?php
/* @var $this AulaController */
/* @var $data Aula */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('conteudo')); ?>:</b>
	<?php echo CHtml::encode($data->conteudo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dataHora')); ?>:</b>
	<?php echo CHtml::encode($data->dataHora); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cal_id')); ?>:</b>
	<?php echo CHtml::encode($data->cal_id); ?>
	<br />


</div>