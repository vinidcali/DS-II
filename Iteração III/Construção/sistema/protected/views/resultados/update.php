<?php
/* @var $this ResultadosController */
/* @var $model Resultados */

$this->breadcrumbs=array(
	'Resultadoses'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

?>

<h1>Atualizar Resultados <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>