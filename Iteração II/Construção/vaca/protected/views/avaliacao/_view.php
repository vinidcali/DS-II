<?php
/* @var $this AvaliacaoController */
/* @var $data Avaliacao */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('nome')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->nome), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('peso')); ?>:</b>
	<?php echo CHtml::encode($data->peso); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('aula_id')); ?>:</b>
	<?php echo CHtml::encode($data->aula_id); ?>
	<br />


</div>