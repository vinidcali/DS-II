<?php
/* @var $this CalendarioController */
/* @var $data Calendario */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('nome')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->nome), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('disc_id')); ?>:</b>
	<?php echo CHtml::encode($data->disc->nome); ?>
	<br />


</div>