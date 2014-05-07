<?php
/* @var $this AulaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Aulas',
);

$this->menu=array(
	array('label'=>'Create Aula', 'url'=>array('create')),
	array('label'=>'Manage Aula', 'url'=>array('admin')),
);
?>

<h1>Aulas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
