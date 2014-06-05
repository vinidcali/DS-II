	<?php
/* @var $this CalendarioController */
/* @var $model Calendario */

Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/protected/scripts.js');

$this->breadcrumbs=array(
	'Minhas Turmas'=>array('index'),
	$model->nome,
);

$this->menu=array(
	array('label'=>'Avaliações', 'url'=>array('avaliacao/index&id=' . $model->disc->id)),
	array('label'=>'Ver Médias', 'url'=>array('medias/index')),
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
//echo "<pre>"; print_r($model->aulas); exit;
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'aula-grid',
	'dataProvider'=>$dataProvider,
	'columns'=>array(
		'dataHora',
		'conteudo',
		array(
            'class' => 'CButtonColumn',
            'header' => 'Editar Frequência',
            'template' => '{freq}',
            'buttons' => array(
                            'freq' => array(
                                        'url'=> '"index.php?r=frequencia/index&id=$data->id"',
                                        //'click'=>'js: function(){alert("oi");}',
                            ),
        	),
    	),
		 array(
            'class' => 'CButtonColumn',
            'header' => 'Editar Conteúdo',
            'template' => '{update}',
            'buttons' => array(
                            'update' => array(
                                        'url'=> '"index.php?r=aula/update&id=$data->id"',
                                        //'click'=>'js: function(){alert("oi");}',
                            ),
        	),
    	),
	),
));

?>
