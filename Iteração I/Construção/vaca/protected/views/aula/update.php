<?php
/* @var $this AulaController */
/* @var $model Aula */

$this->breadcrumbs=array(
	'Aulas'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Aula', 'url'=>array('index')),
	array('label'=>'Create Aula', 'url'=>array('create')),
	array('label'=>'View Aula', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Aula', 'url'=>array('admin')),
);
?>

<h1>Update Aula <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>