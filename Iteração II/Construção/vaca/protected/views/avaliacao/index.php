<?php
/* @var $this AvaliacaoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(                   
	'Avaliações',
);

$this->menu=array(
	array('label'=>'Criar Avaliação', 'url'=>array('create')),
);
?>

<h1>Avaliações</h1>

<?php  
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'avaliacao-grid',
	'dataProvider'=>$dataProvider,
	'columns'=>array(
		'nome',
		'peso',
		'aula.dataHora:text:Aula',
		 array(
            'class' => 'CButtonColumn',
            'template' => '{notas}',
            'header' => 'Notas',
            'buttons' => array(
                            'notas' => array(
                                       'label' => 'Notas',
                                       'url' => '"index.php?r=resultados/index&id=$data->id"',
                            ),
        	),
    	),
		 array(
            'class' => 'CButtonColumn',
            'template' => '{delete}',
            'buttons' => array(
                            'delete' => array(
                                       //'click'=>'js: function(){alert("oi");}',
                            ),
        	),
    	),
		
	),
));
?>
