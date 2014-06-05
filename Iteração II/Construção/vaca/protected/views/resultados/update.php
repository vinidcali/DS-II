<?php
/* @var $this ResultadosController */
/* @var $model Resultados */

$this->breadcrumbs=array(
	'Resultadoses'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Resultados', 'url'=>array('index')),
	array('label'=>'Create Resultados', 'url'=>array('create')),
	array('label'=>'View Resultados', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Resultados', 'url'=>array('admin')),
);
?>

<h1>Update Resultados <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>