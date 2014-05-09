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
$oi = "oi";
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'aula-grid',
	'dataProvider'=>$dataProvider,
	'columns'=>array(
		'dataHora',
		'conteudo',
		 array(
            'class' => 'CButtonColumn',
            'template' => '{update}',
            'buttons' => array(
                            'update' => array(
                                        'url'=> '"index.php?r=aula/update&id=$data->id"',
                            ),
        	),
    	),
	),
));

?>
