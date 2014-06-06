<?php
/* @var $this ResultadosController */
/* @var $model Resultados */

$this->breadcrumbs=array(
	'Resultadoses'=>array('index'),
	$model->id,
);

?>

<h1>View Resultados #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nota',
		'aval_id',
		'aluno_id',
	),
)); ?>
