<?php
/* @var $this MediasController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Medias',
);
?>

<h1>Médias</h1>

<?php 
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'medias-grid',
	'dataProvider'=>$dataProvider,
	'columns'=>array(
		'aluno.pessoa.nome',
		'media',
	),
));

?>
