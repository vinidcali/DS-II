<?php
/* @var $this AulaController */
/* @var $model Aula */

$this->breadcrumbs=array(
	'Minhas Aulas',
	'Aula ' . $model->id,
);

$this->menu=array(
	array('label'=>'View Aula', 'url'=>array('view', 'id'=>$model->id)),
);
?>

<h1>Update Aula <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>