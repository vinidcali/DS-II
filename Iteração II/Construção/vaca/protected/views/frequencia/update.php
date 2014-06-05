<?php
/* @var $this FrequenciaController */
/* @var $model Frequencia */

$this->breadcrumbs=array(
	'Frequencias'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Frequencia', 'url'=>array('index')),
	array('label'=>'Create Frequencia', 'url'=>array('create')),
	array('label'=>'View Frequencia', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Frequencia', 'url'=>array('admin')),
);
?>

<h1>Update Frequencia <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>