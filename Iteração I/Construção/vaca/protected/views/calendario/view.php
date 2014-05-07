<?php
/* @var $this CalendarioController */
/* @var $model Calendario */

$this->breadcrumbs=array(
	'Minhas Turmas'=>array('index'),
	$model->nome,
);
?>

<h1><?php echo $model->nome; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'disc.nome:text:Disciplina',
		'nome',
	),
)); ?>

<br /><br />
<h3>Minhas aulas nesta turma:</h3>

<?php
//$dataProvider=new CActiveDataProvider($model->aulas[0], array ('criteria'=>array('condition'=>'cal_id='.$model->id)));

$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'aula-grid',
	'dataProvider'=>$dataProvider,
	'columns'=>array(
		'dataHora',
		'conteudo',
		array(
			'class'=>'CButtonColumn',
		),
	),
));

?>
