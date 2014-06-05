<?php
/* @var $this FrequenciaController */
/* @var $model Frequencia */

$this->breadcrumbs=array(
	'Frequencias'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Frequencia', 'url'=>array('index')),
	array('label'=>'Create Frequencia', 'url'=>array('create')),
	array('label'=>'Update Frequencia', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Frequencia', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Frequencia', 'url'=>array('admin')),
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
