<?php
/* @var $this FrequenciaController */
/* @var $model Frequencia */

$this->breadcrumbs=array(
	'Frequencias'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);
?>

<h1>Atualizar Frequencia <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>