<?php
/* @var $this AulaController */
/* @var $model Aula */

$this->breadcrumbs=array(
	'Aulas'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Aula', 'url'=>array('index')),
	array('label'=>'Create Aula', 'url'=>array('create')),
	array('label'=>'Update Aula', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Aula', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Aula', 'url'=>array('admin')),
);
?>

<h1>View Aula #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'conteudo',
		'dataHora',
		'cal.nome:text:Turma',
	),
)); ?>
