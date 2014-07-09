<?php
/* @var $this AvaliacaoController */
/* @var $model Avaliacao */

$this->breadcrumbs=array(
	'Avaliacaos'=>array('index'),
	'Create',
);

?>

<h1>Create Avaliacao</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>