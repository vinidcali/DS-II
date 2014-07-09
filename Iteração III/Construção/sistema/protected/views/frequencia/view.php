<?php
/* @var $this FrequenciaController */
/* @var $model Frequencia */

$this->breadcrumbs=array(
	'Frequencias'=>array('index'),
	$model->id,
);

?>

<h1>View Frequencia #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'presente',
		'aluno_id',
		'aula_id',
	),
)); ?>
