<?php
/* @var $this CalendarioController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Minhas Turmas',
);
?>

<h1>Minhas Turmas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>