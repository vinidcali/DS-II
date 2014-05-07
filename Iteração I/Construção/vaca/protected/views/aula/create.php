<?php
/* @var $this AulaController */
/* @var $model Aula */

$this->breadcrumbs=array(
	'Aulas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Aula', 'url'=>array('index')),
	array('label'=>'Manage Aula', 'url'=>array('admin')),
);
?>

<h1>Create Aula</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>