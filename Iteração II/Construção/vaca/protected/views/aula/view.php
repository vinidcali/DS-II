<?php
/* @var $this AulaController */
/* @var $model Aula */

$this->breadcrumbs=array(
	'Minhas Aulas',
	'Aula ' . $model->id,
);

$this->menu=array(
	array('label'=>'Update Aula', 'url'=>array('update', 'id'=>$model->id)),
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
